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
        if(Auth::attempt($data)){
            $con='OK';
        }
        $name=$request->get('name');
        $contraseña=$request->get('password');
        $query=User::where('name','=',$name)->get();
        $contra=User::where('password','=',$contraseña)->get();
        if($query->count()!=0)
        {
            if($contra->count()!=0){
                return view('bienvenido');
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
}
