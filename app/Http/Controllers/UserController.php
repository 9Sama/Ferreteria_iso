<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $data=request()->validate([
            'name'=>'required',
            'password'=>'required'
        ],
        [
            'name.required'=>'Ingrese Usuario',
            'password.required'=>'Ingrese Contraseña',
        ]);

        $name = $request->input('name');
        $contraseña = $request->input('password');

        $credentials = [
            'name' => $name,
            'password' => $contraseña
        ];

        $query=User::where('name','=',$name)->get();

        if($query->count()!=0)
        {
            if (Auth::attempt($credentials)) {
                return redirect()->route('bienvenido');
            }
            else
            {
                return back()->withErrors(['password'=>'Contraseña no valida'])->withInput([request('password')]);
            }
        }
        else{
            return back()->withErrors(['name'=>'Usuario no valido'])->withInput([request('name')]);
        }
    }

    public function logout()
    {
        auth()->logout();
        session()->flush();
        return redirect()->route('user.login');
    }
}
