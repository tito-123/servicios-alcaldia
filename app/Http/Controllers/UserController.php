<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
 
 function index(){
        $users=User::all();
        return response()->json($users,200);
 }

  function verificarUser(Request $request){
//return response()->json("contraseña incorrecta",200);
        $name =$request->name;
         $pass1 =$request->password;
          $usuario=User::all();

        if (DB::table('users')->where('name', $name)->exists()) { 
                 $usuario=$usuario->where('name','=', $name)->first();
                 $pass2=$usuario->password;

                 if (Hash::check($pass1, $pass2)){


                          $usuario2 = new User([
                    'name' => $usuario->name,
                    'email' => $usuario->email,
                    'password' => $pass1,
                    
                  
                    
                ]);

                    return response()->json(json_encode($usuario2),200);
                 	//return response()->json("correcto",200);
                 }else{
                 	return response()->json("contraseña incorrecta",200);
                 }
		
            
    
         } else{

        return response()->json("usuario invalido",200);
         }
		
       
 }
}
