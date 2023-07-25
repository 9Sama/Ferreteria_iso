<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Compra;
use App\Models\CompraDetail;
use DateTime;

class AlmacenController extends Controller
{
    public function index()
    {
        $articulos = Articulo::leftJoin('categoria as c', 'articulo.idcategoria', 'c.idcategoria')
            ->select('articulo.idarticulo', 'articulo.codigo', 'articulo.nombre', 'articulo.precio_venta',
                     'articulo.stock', 'articulo.descripcion', 'articulo.estado', 'c.idcategoria', 'c.descripcion as categoria')
            ->get();

        $compras = Compra::join('persona as p', 'ingreso.idproveedor', 'p.idpersona')
                    ->where('p.tipo_persona', 'proveedor')
                    ->select('ingreso.idingreso', 'p.idpersona', 'p.nombre', 'ingreso.idusuario', 'ingreso.tipo_comprobante', 'ingreso.serie_comprobante',
                             'ingreso.num_comprobante', 'ingreso.fecha', 'ingreso.impuesto', 'ingreso.total', 'ingreso.estado')
                    ->orderBy('ingreso.idingreso')
                    ->get();

        $categorias = Categoria::where('estado', 1)->get();
        return view('almacen.index', compact('articulos', 'categorias', 'compras'));
    }

    public function getAllProducts()
    {
        $articulos = Articulo::leftJoin('categoria as c', 'articulo.idcategoria', 'c.idcategoria')
            ->select('articulo.idarticulo', 'articulo.codigo', 'articulo.nombre', 'articulo.precio_venta',
                     'articulo.stock', 'articulo.descripcion', 'articulo.estado', 'c.idcategoria', 'c.nombre as categoria')
            ->get();

        $categorias = Categoria::where('estado', 1)->get();
        return view('almacen.products', compact('articulos', 'categorias'));
    }

    public function register(Request $request, int $id)
    {
        Articulo::findOrFail($id)->update([
            'idcategoria' => $request->idcategoria,
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'stock' => $request->stock,
            'estado' => 3
        ]);

        return back();
    }

    public function show(int $id)
    {
        $usuario = Auth::user();
        $date = new DateTime();
        $date = $date->format("d/m/Y");
        $compra_details = DB::table('detalle_ingreso as di')
            ->join('articulo as a', 'di.idarticulo', 'a.idarticulo')
            ->where('di.idingreso', $id)
            ->select('di.iddetalle_ingreso', 'di.cantidad as quantity', 'a.nombre as name', 'a.codigo as id', DB::raw('di.cantidad * di.precio as totalprice'), 'di.estado')
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
        return view('almacen.show', compact('date', 'num_compra', 'compra', 'compra_details', 'usuario', 'id'));
    }

    public function changeState(Request $request, $id, $compra_id)
    {
        // Articulo::where('codigo', $id)->update([
        //     'estado' => $request->estado
        // ]);

        CompraDetail::where('iddetalle_ingreso', $compra_id)->update(
            ['estado' => $request->estado]
        );

        return back();
    }

    public function store(Request $request)
    {
        Articulo::create([
            'idcategoria' => $request->idcategoria,
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'precio_venta' => $request->precio_venta,
            'stock' => $request->stock,
            'descripcion' => $request->descripcion,
            'estado' => 4
        ]);

        return back();
    }

    public function addCategory(Request $request)
    {
        Categoria::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => 1
        ]);

        return back();
    }
}
