<?php

namespace App\Http\Controllers;
use Auth;
use App\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {   

        $usuarios = User::where('id','=',$id)->get();
        if($usuarios->isNotEmpty()){
            $usuario = $usuarios['0'];
            if(Auth::user()!=null){ 
                if(Auth::user()->id == $usuario->id){
                    return view('account',compact('usuario'));
                }
                else{
                    return redirect('/productos');
                }
            }
            else{
                return redirect('/login');
            }
        }
    }
}
