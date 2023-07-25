<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puesto=Puesto::all();
        return view('puesto.index',compact('puesto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $area = Area::all();
        return view('puesto.create',compact('area'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'nombre'=> 'required|max:30|unique:puesto,nombre',
            'descripcion'=>'required|max:40',
        ],
        [
            'nombre.required' => 'Ingrese nombre de puesto',
            'nombre.max' => 'El nombre debe tener max 30 caracteres',
            'nombre.unique' => 'Ya existe un puesto con dicho nombre',
            'descripcion.required' => 'Ingrese descripcion del puesto para registrar.',
            'descripcion.max' => 'La descripcion puede tener maximo 40 caracteres.',
        ]);
        $puesto=new Puesto();
        $puesto->idarea=$request->idarea;
        $puesto->nombre=$request->nombre;
        $puesto->descripcion=$request->descripcion;
        $puesto->estado='1';
        $puesto->save();
        return redirect()->route('puesto.index');
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
    public function edit(string $id)
    {
        $puesto = Puesto::findorfail($id);
        $area = Area::all();
        return view('puesto.edit',compact('puesto','area'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $puesto = Puesto::findorfail($id);
        $puesto->idarea=$request->idarea;
        $puesto->nombre=$request->nombre;
        $puesto->descripcion=$request->descripcion;
        $puesto->save();
        return redirect()->route('puesto.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmar($id){
        $puesto = Puesto::findorfail($id);
        return view('puesto.confirmar',compact('puesto'));
    }

    public function destroy(string $id)
    {
        $puesto = Puesto::findorfail($id);
        $puesto->delete();
        return redirect()->route('puesto.index');
    }
}
