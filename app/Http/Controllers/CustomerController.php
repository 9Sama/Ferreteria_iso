<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clientes = Persona::where('tipo_persona', 'cliente')->get();
        return view('cliente.index', compact('clientes'));
    }

    public function store(Request $request)
    {
        Persona::create([
        'tipo_persona' => 'cliente',
        'nombre' => $request->nombre,
        'tipo_documento' => $request->tipo_documento,
        'num_documento' => $request->num_documento,
        'direccion' => $request->direccion,
        'telefono' => $request->telefono,
        'email' => $request->email,
       ]);
       return back();
    }

    public function update(Request $request, int $id)
    {
        $cliente = Persona::findOrFail($id)->update([
            'nombre' => $request->nombre,
            'tipo_documento' => $request->tipo_documento,
            'num_documento' => $request->num_documento,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
       ]);
       return back();
    }

    public function destroy(int $id)
    {
        $cliente = Persona::findOrFail($id)->delete();
        return back();
    }
}
