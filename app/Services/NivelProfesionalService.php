<?php
namespace App\Services;

use App\Models\NivelProfesional;
use Exception;
use Illuminate\Support\Facades\Log;

class NivelProfesionalService{
  public function index()
  {
    try {
      $nivel_profesional = NivelProfesional::get();
      $response = $nivel_profesional->map(function ($nivel) {
        return [
          'id' => $nivel->id,
          'cod_nivel' => $nivel->cod_nivel,
          'nivel_profesional' => $nivel->nivel_profesional,
          'nivel_profesional_corto' => $nivel->nivel_profesional_corto,
          'pago' => $nivel->pago
        ];
      });
      return [
        'responseCode' => 200,
        'message' => 'Lista de nivel profesionales',
        'data' => $response
      ];

    } catch (Exception $error) {
      Log::error("[Archivo: {$error->getFile()}] [Línea: {$error->getLine()}] Mensaje: {$error->getMessage()}");
      return [
        'responseCode' => 500,
        'message' => 'Internal Server Error',
        'data' => null
      ];
    } 
  }

  public function store($request)
  {
    try {
      $nivel_profesional = NivelProfesional::create([
        'cod_nivel' => $request->cod_nivel,
        'nivel_profesional' => $request->nivel_profesional,
        'nivel_profesional_corto' => $request->nivel_profesional_corto,
        'pago' => $request->pago
      ]);
      $response['id'] =  $nivel_profesional->id;
      $response['cod_nivel'] =  $nivel_profesional->cod_nivel;
      $response['nivel_profesional'] =  $nivel_profesional->nivel_profesional;
      $response['nivel_profesional_corto'] =  $nivel_profesional->nivel_profesional_corto;
      $response['pago'] =  $nivel_profesional->pago;
      return [
        'responseCode' => 200,
        'message' => 'Lista de niveles profesionales',
        'data' => $response
      ];
    } catch (Exception $error) {
      Log::error("[Archivo: {$error->getFile()}] [Línea: {$error->getLine()}] Mensaje: {$error->getMessage()}");
      return [
        'responseCode' => 500,
        'message' => 'Internal Server Error',
        'data' => null
      ];
    }
  }

  public function update($request,$id)
  {
    try {
      $nivel_profesional = NivelProfesional::find($id);
      if (!$nivel_profesional) {
        return [
          'responseCode' => 404,
          'message' => 'Nivel profesional no encontrado',
          'data' => null
        ];
      }
      $data = $request->only(['cod_nivel','nivel_profesional','nivel_profesional_corto','pago']);
      if(empty($data))
      {
        return [
          'responseCode' => 404,
          'message' => 'Parametros invalidos enviados en la solicitud',
          'data' => null
        ];
      }
      $nivel_profesional->fill($data);
      $nivel_profesional->save();
      return [
        'responseCode' => 200,
        'message' => 'Nivel profesional actualizado correctamente',
        'data' => $nivel_profesional
      ];
    } catch (Exception $error) {
      Log::error("[Archivo: {$error->getFile()}] [Línea: {$error->getLine()}] Mensaje: {$error->getMessage()}");
      return [
        'responseCode' => 500,
        'message' => 'Internal Server Error',
        'data' => null
      ];
    }
  }

  public function destroy($request,$id)
  {
    try {
      $nivel_profesional = NivelProfesional::find($id);
      if (!$nivel_profesional) {
        return [
          'responseCode' => 404,
          'message' => 'Nivel profesional no encontrado',
          'data' => null
        ];
      }
      $nivel_profesional->delete();
      return [
        'responseCode' => 200,
        'message' => 'Nivel profesional borrado correctamente',
        'data' => $nivel_profesional
      ];
    } catch (Exception $error)  {
      Log::error("[Archivo: {$error->getFile()}] [Línea: {$error->getLine()}] Mensaje: {$error->getMessage()}");
      return [
        'responseCode' => 500,
        'message' => 'Internal Server Error',
        'data' => null
      ];
    }
    

  }

}

