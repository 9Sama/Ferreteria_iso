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
        $postulante=Postulante::where('estado','=','1')->get();
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
        $postulante=new Postulante();
        $postulante->dni=$request->dni;
        $postulante->apellidos=$request->apellidos;
        $postulante->nombres=$request->nombres;
        $postulante->gradoEstudios=$request->gradoEstudios;
        $postulante->centroEstudios=$request->centroEstudios;
        $postulante->estado='1';
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
        $postulante->estado='0';
        $postulante->save();
        return redirect(route('postulante.index'));
    }
}
