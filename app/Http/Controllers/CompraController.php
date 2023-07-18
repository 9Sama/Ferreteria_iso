<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Compra;
use App\Models\CompraDetail;
use App\Models\Persona;
use DateTime;

class CompraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $proveedores = Persona::where('tipo_persona', 'proveedor')->get();
        $compras = Compra::join('persona as p', 'ingreso.idproveedor', 'p.idpersona')
                    ->where('p.tipo_persona', 'proveedor')
                    ->select('ingreso.idingreso', 'p.idpersona', 'p.nombre', 'ingreso.idusuario', 'ingreso.tipo_comprobante', 'ingreso.serie_comprobante',
                             'ingreso.num_comprobante', 'ingreso.fecha', 'ingreso.impuesto', 'ingreso.total', 'ingreso.estado')
                    ->get();
        return view('compra.index', compact('proveedores', 'compras'));
    }

    public function create()
    {
        $proveedores = Persona::where('tipo_persona', 'proveedor')->get();
        $articulos = DB::table('articulo as a')
            ->join('categoria as c', 'a.idcategoria', 'c.idcategoria')
            ->where('a.estado', 1)
            ->where('c.estado', 1)
            ->select('a.idarticulo', 'c.idcategoria', 'c.nombre', 'a.codigo', 'a.nombre', 'a.precio_venta', 'a.stock', 'a.descripcion', 'a.estado')
            ->get();
        return view('compra.create', compact('proveedores', 'articulos'));
    }

    public function store(Request $request)
    {
        $codigos = $request->codigoarticulos;
        $ids = $request->idarticulos;
        $cantidades = $request->cantidadarticulos;
        $precios = $request->preciosarticulos;

        if (Compra::all()->count()) {
            $last_compra_id = Compra::all()->last()->idingreso+1;
        } else {
            $last_compra_id = 1;
        }

        $compra = new Compra();
        $compra->idingreso = $last_compra_id;
        $compra->fecha = $request->fecha;
        $compra->idproveedor = $request->idpersona;
        $compra->idusuario = Auth::id();
        $compra->tipo_comprobante = $request->tipo_comprobante;
        $compra->serie_comprobante = $request->serie_comprobante;
        $compra->num_comprobante = $request->num_comprobante;
        $compra->total = 0;
        $compra->impuesto = 0;
        $compra->estado = 'PENDIENTE';
        $compra->save();

        if($ids != null){
            for($i=0;$i<count($ids);$i++){
                $detalle_c = new CompraDetail();
                $detalle_c->idingreso = $last_compra_id;
                $detalle_c->idarticulo = $ids[$i];
                $detalle_c->cantidad = $cantidades[$i];
                $detalle_c->precio = $precios[$i];
                $detalle_c->save();
                DB::table('ingreso')->where('idingreso', $last_compra_id)->incrementEach([
                    'total' => $cantidades[$i] * $precios[$i],
                    'impuesto' => $cantidades[$i] * $precios[$i] * 0.18
                ]);
                DB::table('articulo')->where('idarticulo', $ids[$i])->increment('stock', $cantidades[$i]);
            }
        }
        return redirect()->route('compras.index');
    }

    public function show(int $id)
    {
        $usuario = Auth::user();
        $date = new DateTime();
        $date = $date->format("d/m/Y");
        $compra_details = DB::table('detalle_ingreso as di')
            ->join('articulo as a', 'di.idarticulo', 'a.idarticulo')
            ->where('di.idingreso', $id)
            ->select('di.cantidad as quantity', 'a.nombre as name', 'a.codigo as id', DB::raw('di.cantidad * di.precio as totalprice'))
            ->get();

        $compra = Compra::findOrFail($id);
        $compra->subtotal = $compra->total - $compra->impuesto;

        if($compra->idingreso < 10){
            $num_compra = "#00000".$compra->idingreso;
        }else if($compra->idingreso > 9 && $compra->id < 100){
            $num_compra = "#0000".$compra->id;
        }else if($compra->idingreso > 99 && $compra->idingreso < 1000){
            $num_compra = "#000".$compra->idingreso;
        }else if($compra->idingreso > 999 && $compra->idingreso < 10000){
            $num_compra = "#00".$compra->idingreso;
        }else if($compra->idingreso > 9999 && $compra->idingreso < 100000){
            $num_compra = "#0".$compra->idingreso;
        }else if($compra->idingreso > 99999 && $compra->idingreso < 1000000){
            $num_compra = "#".$compra->idingreso;
        }
        return view('compra.show', compact('date', 'num_compra', 'compra', 'compra_details', 'usuario'));
    }

    public function approve(int $id)
    {
        Compra::findOrFail($id)->update([
            'estado' => 'ACEPTADO'
        ]);

        return redirect()->route('compras.index');
    }
    public function reject(int $id)
    {
        Compra::findOrFail($id)->update([
            'estado' => 'RECHAZADO'
        ]);

        return redirect()->route('compras.index');
    }
}
