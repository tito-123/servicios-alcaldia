<?php

namespace App\Http\Controllers;
use App\Senalizacione;
use App\Insidencia;
use App\SenalTipo;
use App\SenalCategoria;
use App\DetalleSenal;
use App\User;
use Sujip\Guid\Guid;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class SeñalizacionController extends Controller
{
 
 function index(){
      //  $senal=Senalizacione::all();
        $senal=Senalizacione::orderBy('id', 'desc')->get();
        return response()->json($senal,200);
 }

  function senal(Request $request){
      //  $senal=Senalizacione::all();
    $id=$request->codigo;
        $señalizacione = Senalizacione::find($id);
        return response()->json($señalizacione,200);
 }

 function create( Request $request){
 	try{

 	/*$guid = new Guid;

$guid = $guid->create();
 return response()->json([$guid]);*/

$parameters = $request->json()->all();

     $rules =  array(
            'detalle'    => 'required|unique:senalizaciones',
            'codigo' => 'required|max:8',
        );
        
        $messages = array(
            'detalle.unique' => 'el detalle ingresado ya existe',
            'codigo.max' => 'maximo 8 caracteres'
        );
      
       $validator = \Validator::make(array('detalle' => $parameters['detalle'],'codigo' => $parameters['codigo']), $rules, $messages);
 
      if(!$validator->fails()) {
        
      $imageName = str_random(10).'.'.'png';
      $Base64Img=$request->ruta;
      $Base64Img = base64_decode($Base64Img);
      \Storage::disk('local')->put($imageName,  $Base64Img);

      $file_path='img/'.$imageName;
      $url = asset($file_path);
      $ruta=$url;

                $senal = new Senalizacione([
                    'detalle' => $request->detalle,
                    'codigo' => $request->codigo,
                    'id_tipo' => $request->id_tipo,
                    'id_categoria' => $request->id_categoria,
                    'imagen' => $ruta,
                    
                ]);

        DB::beginTransaction();
        try {
            $senal->save();
         
         
         /*    $detalleSenal = new DetalleSenal([
                    'id_usuario' => 1,
                    'id_senal' => $senal->id,
                    
                ]);
             $detalleSenal->save();*/
              DB::commit();
            return response()->json([
        'success']);
        } catch (\Exception $ex) {
            DB::rollback();
            return response()->json([
        'Error al guardar los datos']);
        }

       /* if($senal->save()) {
       return response()->json([
        'success']);
    }     
    //return Response::json(array('error' => true), 200);
          return response()->json([
        'error']);*/
        
       // return response()->json($user_views);
      } else {
            $errors = $validator->errors();
            return response()->json($errors->all());
      }
 	 


 	}catch(\Exception $e){
    $result= array("code" => 500,"state"=> false,"data"=>$e->getMessage());

 	}
     
        return response()->json($result);
 }

function modificarSeñal( Request $request){
  try{
  
$parameters = $request->json()->all();

     

      $verificarImagen=$request->ruta;
       $idsenal=$request->id;


        if($verificarImagen=="vacio"){

           $senal = Senalizacione::find($idsenal);
     // $ruta =$señalizacione->imagen ;
    //  $ruta=$url;

                   $senal->detalle = $request->detalle;
                    $senal->codigo = $request->codigo;
                    $senal->id_tipo = $request->id_tipo;
                   $senal->id_categoria= $request->id_categoria;

                      if($senal->save()) {
                     return response()->json(['success']);
                       }     
                
                        return response()->json(['error']);

          }else{
       //  return response()->json(['hola']);


                 $imageName = str_random(10).'.'.'png';
                $Base64Img=$request->ruta;
                $Base64Img = base64_decode($Base64Img);
                \Storage::disk('local')->put($imageName,  $Base64Img);

                $file_path='img/'.$imageName;
                $url = asset($file_path);
                $ruta=$url;

                $senal = Senalizacione::find($idsenal);

                     $senal->detalle = $request->detalle;
                    $senal->codigo = $request->codigo;
                    $senal->id_tipo = $request->id_tipo;
                     $senal->id_categoria= $request->id_categoria;
              
                    $senal->imagen = $ruta;
                    
              

                   if($senal->save()) {
                   return response()->json(['success']);
                   }     
                  //return Response::json(array('error' => true), 200);
                return response()->json(['error']);

          }

     
        
       // return response()->json($user_views);

      


  }catch(\Exception $e){
    $result= array("code" => 500,"state"=> false,"data"=>$e->getMessage());

  }
     
        return response()->json($result);
 }

 function registrarSenalMovil( Request $request){

try{
//return response()->json("insertada con exito",200);

    $latitud =$request->latitud;
    $longitud =$request->longitud;
    $observacion =$request->observacion;
    $imagen =$request->imagen;
    $name =$request->usuario;
 // return response()->json( $name,200);
        $imageName = str_random(10).'.'.'png';
      $Base64Img=$imagen;
      $Base64Img = base64_decode($Base64Img);
      \Storage::disk('local')->put($imageName,  $Base64Img);

      $file_path='img/'.$imageName;
      $url = asset($file_path);
      $ruta=$url;
//return response()->json($request,200);
                 $usuario=User::all();
            //     return response()->json( $usuario,200);
                 $usuario=$usuario->where('name','=', $name)->first();
                 $idusuario=$usuario->id;

     $insidencia = new Insidencia([
                    'observacion' => $observacion,
                    'fecha' => "11-06-2019",
                    'imagen' => $ruta,
                    'id_usuario' => $idusuario,
                ]);
    
        if($insidencia->save()) {
       return response()->json("enviado con exito",200);
    }     
    //return Response::json(array('error' => true), 200);
          return response()->json("error al enviar",200);

 }catch(\Exception $e){
    $result= array("code" => 500,"state"=> false,"data"=>$e->getMessage());

  }
     
        return response()->json($result);

}

public function eliminar(Request $request)
    {      
      $id=$request->codigo;
        try{

             $señalizacion=Senalizacione::find($id);
            if ($señalizacion->delete()){
       return response()->json([
        'success']);
    }     
    //return Response::json(array('error' => true), 200);
          return response()->json([
        'error']);

        }catch(\Exception $e){
    $result= array("code" => 500,"state"=> false,"data"=>$e->getMessage());

  }
       
    }


}
