<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Insidencia;
class InsidenciasController extends Controller
{
    //
     function index(){
      //  $senal=Senalizacione::all();
        $insidencias=Insidencia::orderBy('id', 'desc')->get();
        return response()->json($insidencias,200);
 }

}
