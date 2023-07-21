<?php

namespace App\Http\Controllers;

use App\Models\Plaza;
use App\Models\Puesto;
use Illuminate\Http\Request;

class PlazaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $plaza = Plaza::all();
        return view('plaza.index', compact('plaza'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $puesto = Puesto::where('estado', '=', '1')->get();
        return view('plaza.create', compact('puesto'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate(
            [
                'idpuesto' => 'required',
                'cantidad' => 'required',
                'convocatoria' => 'required',
            ],
            [
                'idpuesto.required' => 'Ingrese nombre del puesto',
                'cantidad.required' => 'Ingrese cantidad de plazas a asignar',
                'cantidad.required' => 'Ingrese detalle convocatoria a la plaza',
            ]
        );
        $plaza = new Plaza();
        $plaza->idpuesto = $request->idpuesto;
        $plaza->cantidad = $request->cantidad;
        $plaza->convocatoria = $request->convocatoria;
        $puesto = Puesto::findorfail($plaza->idpuesto);
        $puesto->estado = '0';
        $plaza->save();
        $puesto->save();
        return redirect()->route('plaza.index');
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
        $plaza = Plaza::findorfail($id);
        $puesto = Puesto::where('estado', '=', '1')->get();
        return view('plaza.edit', compact('plaza', 'puesto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $plaza = Plaza::findorfail($id);
        $puesto = Puesto::findorfail($id);
        $puesto->estado = '1';
        $puesto->save();
        $plaza->idpuesto = $request->idpuesto;
        $plaza->cantidad = $request->cantidad;
        $plaza->convocatoria = $request->convocatoria;
        $plaza->save();
        $puesto = Puesto::findorfail($request->idpuesto);
        $puesto->estado = '0';
        $puesto->save();
        return redirect()->route('plaza.index');
    }
    public function confirmar($id)
    {
        $plaza = Plaza::findorfail($id);
        return view('plaza.confirmar', compact('plaza'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $plaza = Plaza::findorfail($id);
        $puesto = Puesto::findorfail($plaza->idpuesto);
        $puesto->estado = '1';
        $puesto->save();
        $plaza->delete();
        return redirect()->route('plaza.index');
    }
}
