<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;

class PostulanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postulante=Postulante::all();
        return view('postulante.index',compact('postulante'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('postulante.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'dni'=>'required|digits:8|unique:postulante,dni',
            'apellidos'=> 'required|max:35',
            'nombres'=> 'required|max:40',
            'gradoEstudios'=> 'required|max:40',
            'centroEstudios'=> 'required|max:45',
            'celular'=> 'required|digits:9|unique:postulante,celular',
            'direccion'=> 'required|max:30',
            'fechanac'=> 'required',
        ],
        [
            'dni.required' => 'Ingrese dni del postulante',
            'dni.max' => 'El dni debe tener 8 caracteres',
            'dni.unique' => 'Ya existe un postulante con dicho dni',
            'nombres.required' => 'Ingrese nombres del postulante para registrarse.',
            'nombres.max' => 'Los nombres del postulante puede tener maximo 35 caracteres.',
            'apellidos.required' => 'Ingrese apellidos del postulante para registrarse.',
            'apellidos.max' => 'Los apellidos puede tener maximo 30 caracteres.',
            'celular.required' => 'Ingrese telefono',
            'celular.max' => 'El telefono debe tener 9 caracteres',
            'celular.unique' => 'Ya existe un postulante con dicho telefono',
            'gradoEstudios.required' => 'Ingrese gradoEstudios del postulante',
            'gradoEstudios.max' => 'gradoEstudios puede tener maximo 40 caracteres.',
            'centroEstudios.required' => 'Ingrese centroEstudios del postulante',
            'centroEstudios.max' => 'centroEstudios puede tener maximo 45 caracteres.',
            'direccion.required' => 'Ingrese direccion del postulante',
            'direccion.max' => 'Direccion puede tener maximo 30 caracteres.',
            'fechanac.required' => 'Ingrese fechanacimiento del postulante',
        ]);
        $postulante=new Postulante();
        $postulante->dni=$request->dni;
        $postulante->apellidos=$request->apellidos;
        $postulante->nombres=$request->nombres;
        $postulante->gradoEstudios=$request->gradoEstudios;
        $postulante->centroEstudios=$request->centroEstudios;
        $postulante->celular=$request->celular;
        $postulante->direccion=$request->direccion;
        $postulante->fechanac=$request->fechanac;
        $postulante->save();
        return redirect()->route('postulante.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $postulante=Postulante::findOrFail($id);
        return view('postulante.edit',compact('postulante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $postulante=Postulante::findOrFail($id);
        $postulante->dni=$request->dni;
        $postulante->apellidos=$request->apellidos;
        $postulante->nombres=$request->nombres;
        $postulante->gradoEstudios=$request->gradoEstudios;
        $postulante->centroEstudios=$request->centroEstudios;
        $postulante->celular=$request->celular;
        $postulante->direccion=$request->direccion;
        $postulante->fechanac=$request->fechanac;
        $postulante->save();
        return redirect()->route('postulante.index');
    }
    public function confirmar($id){
        $postulante=Postulante::findOrFail($id);
        return view('postulante.confirmar',compact('postulante'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $postulante=Postulante::findOrFail($id);
        $postulante->delete();
        return redirect(route('postulante.index'));
    }
}
