<?php
namespace App\Services;

use App\Models\Estado;
use Exception;
use Illuminate\Support\Facades\Log;

class EstadosService{
  public function index()
  {
    try {
      $estados = Estado::get();
      $response = $estados->map(function ($estado) {
        return [
          'id' => $estado->id,
          'estado' => $estado->estado,
          'pais_id' => $estado->pais_id,
          'region' => $estado->region,
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
      $estado = Estado::create([
        'estado' => $request->estado,
        'pais_id' => $request->pais_id,
        'region' => $request->region,

      ]);
      $response['estado'] =  $estado->estado;
      $response['pais_id'] = $estado->pais_id;
      $response['region'] = $estado->region;
      return [
        'responseCode' => 200,
        'message' => 'Estado Registrado',
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
      $estado = Estado::find($id);
      if (!$estado) {
        return [
          'responseCode' => 404,
          'message' => 'Estado no encontrado',
          'data' => null
        ];
      }
      $data = $request->only(['estado', 'pais_id','region']);
      if(empty($data))
      {
        return [
          'responseCode' => 404,
          'message' => 'Parametros invalidos enviados en la peticion',
          'data' => null
        ];
      }
      $estado->fill($data);
      $estado->save();
      return [
        'responseCode' => 200,
        'message' => 'Permission updated successfully',
        'data' => $estado
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
      $estado = Estado::find($id);
      if (!$estado) {
        return [
          'responseCode' => 404,
          'message' => 'Estado no encontrado',
          'data' => null
        ];
      }
      $estado->delete();
      return [
        'responseCode' => 200,
        'message' => 'Estado eliminado',
        'data' => $estado
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

}

