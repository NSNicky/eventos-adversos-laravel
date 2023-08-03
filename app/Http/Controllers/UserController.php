<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Usuarios;
use Session;

class UserController extends Controller
{
    public function login(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $adminCount = Usuarios::where(['Login' => $data['user'],'Pwd'=>md5($data['password'])])->count();
            if ($adminCount > 0) {
                Session::put('userSession', $data['user']);
                return redirect('/inicio');
            }else{
                return redirect('/')->with('flash_message_error','Usuario o Clave incorrectas');
        	}
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('flash_message_success', 'Sesion cerrada correctamente.');
    }

}
