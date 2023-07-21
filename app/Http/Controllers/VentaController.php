<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;
use App\Models\VentaDetail;
use App\Models\Persona;
use DateTime;

class VentaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Persona::where('tipo_persona', 'cliente')->get();
        $ventas = Venta::join('persona as p', 'venta.idcliente', 'p.idpersona')
                    ->where('p.tipo_persona', 'cliente')
                    ->select('venta.idventa', 'p.idpersona', 'p.nombre', 'venta.idusuario', 'venta.tipo_comprobante', 'venta.serie_comprobante',
                             'venta.num_comprobante', 'venta.fecha_hora', 'venta.impuesto', 'venta.total', 'venta.estado')
                    ->get();
        return view('venta.index', compact('clientes', 'ventas'));
    }

    public function create()
    {
        $clientes = Persona::where('tipo_persona', 'cliente')->get();
        $articulos = DB::table('articulo as a')
            ->join('categoria as c', 'a.idcategoria', 'c.idcategoria')
            ->where('a.estado', 1)
            ->where('c.estado', 1)
            ->select('a.idarticulo', 'c.idcategoria', 'c.nombre', 'a.codigo', 'a.nombre', 'a.precio_venta', 'a.stock', 'a.descripcion', 'a.estado')
            ->get();
        return view('venta.create', compact('clientes', 'articulos'));
    }

    public function store(Request $request)
    {
        $codigos = $request->codigoarticulos;
        $ids = $request->idarticulos;
        $cantidades = $request->cantidadarticulos;
        $precios = $request->preciosarticulos;

        if (venta::all()->count()) {
            $last_venta_id = venta::all()->last()->idventa+1;
        } else {
            $last_venta_id = 1;
        }

        $venta = new venta();
        $venta->idventa = $last_venta_id;
        $venta->fecha_hora = $request->fecha;
        $venta->idcliente = $request->idpersona;
        $venta->idusuario = Auth::id();
        $venta->tipo_comprobante = $request->tipo_comprobante;
        $venta->serie_comprobante = $request->serie_comprobante;
        $venta->num_comprobante = $request->num_comprobante;
        $venta->total = 0;
        $venta->impuesto = 0;
        $venta->estado = 'PENDIENTE';
        $venta->save();

        if($ids != null){
            for($i=0;$i<count($ids);$i++){
                $detalle_c = new ventaDetail();
                $detalle_c->idventa = $last_venta_id;
                $detalle_c->idarticulo = $ids[$i];
                $detalle_c->cantidad = $cantidades[$i];
                $detalle_c->precio = $precios[$i];
                $detalle_c->save();
                DB::table('venta')->where('idventa', $last_venta_id)->incrementEach([
                    'total' => $cantidades[$i] * $precios[$i],
                    'impuesto' => $cantidades[$i] * $precios[$i] * 0.18
                ]);
                DB::table('articulo')->where('idarticulo', $ids[$i])->decrement('stock', $cantidades[$i]);
            }
        }
        return redirect()->route('ventas.index');
    }

    public function show(string $id)
    {
        $usuario = Auth::user();
        $date = new DateTime();
        $date = $date->format("d/m/Y");
        $venta_details = DB::table('detalle_venta as di')
            ->join('articulo as a', 'di.idarticulo', 'a.idarticulo')
            ->where('di.idventa', $id)
            ->select('di.cantidad as quantity', 'a.nombre as name', 'a.codigo as id', DB::raw('di.cantidad * di.precio as totalprice'))
            ->get();

        $venta = venta::findOrFail($id);
        $venta->subtotal = $venta->total - $venta->impuesto;

        if($venta->idventa < 10){
            $num_venta = "#00000".$venta->idventa;
        }else if($venta->idventa > 9 && $venta->id < 100){
            $num_venta = "#0000".$venta->id;
        }else if($venta->idventa > 99 && $venta->idventa < 1000){
            $num_venta = "#000".$venta->idventa;
        }else if($venta->idventa > 999 && $venta->idventa < 10000){
            $num_venta = "#00".$venta->idventa;
        }else if($venta->idventa > 9999 && $venta->idventa < 100000){
            $num_venta = "#0".$venta->idventa;
        }else if($venta->idventa > 99999 && $venta->idventa < 1000000){
            $num_venta = "#".$venta->idventa;
        }
        return view('venta.show', compact('date', 'num_venta', 'venta', 'venta_details', 'usuario'));
    }

    public function approve(int $id)
    {
        Venta::findOrFail($id)->update([
            'estado' => 'ACEPTADO'
        ]);

        return redirect()->route('ventas.index');
    }

    public function reject(int $id)
    {
        Venta::findOrFail($id)->update([
            'estado' => 'RECHAZADO'
        ]);

        return redirect()->route('ventas.index');
    }
}
