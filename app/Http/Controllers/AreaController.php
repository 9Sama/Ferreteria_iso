<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $area=Area::where('estado','=','1')->get();
        return view('area.index',compact('area'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('area.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'nombre'=> 'required|max:30|unique:area,nombre',
            'descripcion'=>'required|max:40',
        ],
        [
            'nombre.required' => 'Ingrese nombre de area',
            'nombre.max' => 'El nombre debe tener max 30 caracteres',
            'nombre.unique' => 'Ya existe un area con dicho nombre',
            'descripcion.required' => 'Ingrese descripcion del area para registrar.',
            'descripcion.max' => 'La descripcion puede tener maximo 50 caracteres.',
        ]);
        $area=new Area();
        $area->nombre=$request->nombre;
        $area->descripcion=$request->descripcion;
        $area->estado='1';
        $area->save();
        return redirect()->route('area.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $idarea)
    {
        $area=Area::findOrFail($idarea);
        return view('area.edit',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $idarea)
    {
        $area=Area::findOrFail($idarea);
        $area->nombre=$request->nombre;
        $area->descripcion=$request->descripcion;
        $area->save();
        return redirect()->route('area.index');
    }
    public function confirmar($idarea){
        $area=Area::findOrFail($idarea);
        return view('area.confirmar',compact('area'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $idarea)
    {
        $area=Area::findOrFail($idarea);
        $area->estado='0';
        $area->save();
        return redirect(route('area.index'));
    }
}
