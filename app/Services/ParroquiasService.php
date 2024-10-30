<?php
namespace App\Services;
use App\Models\Parroquia;
use Exception;
use Illuminate\Support\Facades\Log;

class ParroquiasService{
  public function index()
  {
    try {
      $parroquias = Parroquia::get();
      $response = $parroquias->map(function ($parroquia) {
        return [
          'id' => $parroquia->id,
          'parroquia' => $parroquia->parroquia,
          'estado_id' => $parroquia->municipio_id,
        ];
      });
      return [
        'responseCode' => 200,
        'message' => 'Lista de parroquias',
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

  public function results($nData)
  {
    try {
      $response = Parroquia::paginate($nData);
      return [
        'responseCode' => 200,
        'message' => 'Lista de parroquias con paginacion',
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
      $parroquia = Parroquia::create([
        'parroquia' => $request->parroquia,
        'municipio_id' => $request->municipio_id,

      ]);
      $response['parroquia'] =  $parroquia->parroquia;
      $response['municipio_id'] = $parroquia->municipio_id;
      return [
        'responseCode' => 200,
        'message' => 'Parroquia Registrada',
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
      $parroquia = Parroquia::find($id);
      if (!$parroquia) {
        return [
          'responseCode' => 404,
          'message' => 'Parroquia no encontrado',
          'data' => null
        ];
      }
      $data = $request->only(['parroquia','municipio_id']);
      if(empty($data))
      {
        return [
          'responseCode' => 404,
          'message' => 'Parametros invalidos enviados en la peticion',
          'data' => null
        ];
      }
      $parroquia->fill($data);
      $parroquia->save();
      return [
        'responseCode' => 200,
        'message' => 'Parroquia actualizado correctamente',
        'data' => $parroquia
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
      $parroquia = Parroquia::find($id);
      if (!$parroquia) {
        return [
          'responseCode' => 404,
          'message' => 'Parroquia no encontrado',
          'data' => null
        ];
      }
      $parroquia->delete();
      return [
        'responseCode' => 200,
        'message' => 'Parroquia eliminada',
        'data' => $parroquia
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

