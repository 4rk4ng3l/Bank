<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SessionsController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function store(){
        if(auth()->attempt(request(['dni', 'password'])) == false){
            return back()->withErrors([
                'message' => 'La identificacion o la contraseña son incorrectos, intente de nuevo',
            ]);
        }
        return redirect()->to('/');
    }

    public function destroy(){
        auth()->logout();
        return redirect()->to('/login');
    }
}
