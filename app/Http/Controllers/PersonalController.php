<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use App\Models\Plaza;
use App\Models\Postulante;
use App\Models\Puesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personal = Personal::all();
        return view('personal.index',compact('personal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create2($id)
    {
        $postulante=Postulante::findOrFail($id);
        $puesto = Puesto::all();
        return view('personal.create',compact('puesto','postulante'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=request()->validate([
            'dni'=>'required|digits:8|unique:personal,dni',
            'apellidos'=> 'required|max:35',
            'nombres'=> 'required|max:40',
            'sueldo'=> 'required',
            'fechanac'=> 'required',
            'fechaIng'=> 'required',
            'idpuesto'=> 'required',
        ],
        [
            'dni.required' => 'Ingrese dni del personal',
            'dni.max' => 'El dni debe tener 8 caracteres',
            'dni.unique' => 'Ya existe un personal con dicho dni',
            'nombres.required' => 'Ingrese nombres del personal para registrarse.',
            'nombres.max' => 'Los nombres del personal puede tener maximo 35 caracteres.',
            'apellidos.required' => 'Ingrese apellidos del personal para registrarse.',
            'apellidos.max' => 'Los apellidos puede tener maximo 40 caracteres.',
            'fechanac.required' => 'Ingrese fecha nacimiento del personal',
            'fechaIng.required' => 'Ingrese fecha ingreso del personal',
            'sueldo.required' => 'Ingrese sueldo del personal',
            'idpuesto.required' => 'Ingrese puesto del personal',
        ]);
        
        $personal=new Personal();
        $postulante=Postulante::findOrFail($request->idpostulante);
        $personal->dni=$postulante->dni;
        $personal->apellidos=$postulante->apellidos;
        $personal->nombres=$postulante->nombres;
        $personal->fechanac=$postulante->fechanac;
        $personal->gradoEstudios=$postulante->gradoEstudios;
        $personal->centroEstudios=$postulante->centroEstudios;
        $personal->celular=$postulante->celular;
        $personal->direccion=$postulante->direccion;
        $personal->idpuesto=$request->idpuesto;
        $personal->fechaIng=$request->fechaIng;
        $personal->sueldo=$request->sueldo;
        $idPlaza = DB::table('plaza')
        ->join('puesto', 'plaza.idpuesto', '=', 'puesto.idpuesto')
        ->where('plaza.idpuesto', $personal->idpuesto)
        ->pluck('plaza.idplaza')
        ->first();
        $plaza=Plaza::findOrFail($idPlaza);
        
        if($plaza->cantidad > 0)
        {
            $plaza->cantidad=$plaza->cantidad-1;
            $plaza->save();
            $postulante->delete();
            $personal->save();
            return redirect()->route('personal.index');
        }else{
            return view('personal.error', ['message' => 'EL REGISTRO ES CERO']);
        }
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
        $personal=Personal::findOrFail($id);
        $puesto = Puesto::all();
        return view('personal.edit',compact('personal','puesto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $personal=Personal::findOrFail($id);
        $personal->dni=$request->dni;
        $personal->apellidos=$request->apellidos;
        $personal->nombres=$request->nombres;
        $personal->fechanac=$request->fechanac;
        $personal->fechaIng=$request->fechaIng;
        $personal->sueldo=$request->sueldo;
        $personal->idpuesto=$request->idpuesto;
        $personal->gradoEstudios=$request->gradoEstudios;
        $personal->centroEstudios=$request->centroEstudios;
        $personal->celular=$request->celular;
        $personal->direccion=$request->direccion;
        $personal->save();
        return redirect()->route('personal.index');
    }
    public function confirmar($id){
        $personal=Personal::findOrFail($id);
        return view('personal.confirmar',compact('personal'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $personal=Personal::findOrFail($id);
        $idPlaza = DB::table('plaza')
        ->join('puesto', 'plaza.idpuesto', '=', 'puesto.idpuesto')
        ->where('plaza.idpuesto', $personal->idpuesto)
        ->pluck('plaza.idplaza')
        ->first();
        $plaza=Plaza::findOrFail($idPlaza);
        $plaza->cantidad=$plaza->cantidad+1;
        $plaza->save();
        $personal->delete();
        return redirect(route('personal.index'));
    }
}
