<?php
namespace App\Services;
use App\Models\Municipio;
use Exception;
use Illuminate\Support\Facades\Log;

class MunicipiosService{
  public function index()
  {
    try {
      $municipios = Municipio::get();
      $response = $municipios->map(function ($municipio) {
        return [
          'id' => $municipio->id,
          'municipio' => $municipio->municipio,
          'capital' => $municipio->capital,
          'estado_id' => $municipio->estado_id,
        ];
      });
      return [
        'responseCode' => 200,
        'message' => 'Lista de municipios',
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
      Log::info("Entro en el servicio");
      $response = Municipio::paginate($nData);
      return [
        'responseCode' => 200,
        'message' => 'Lista de municipios con paginacion',
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
      $municipio = Municipio::create([
        'municipio' => $request->municipio,
        'capital' => $request->capital,
        'estado_id' => $request->estado_id,

      ]);
      $response['municipio'] =  $municipio->municipio;
      $response['capital'] = $municipio->capital;
      $response['estado_id'] = $municipio->estado_id;
      return [
        'responseCode' => 200,
        'message' => 'Municipio Registrado',
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
      $municipio = Municipio::find($id);
      if (!$municipio) {
        return [
          'responseCode' => 404,
          'message' => 'Municipio no encontrado',
          'data' => null
        ];
      }
      $data = $request->only(['municipio', 'capital','estado_id']);
      if(empty($data))
      {
        return [
          'responseCode' => 404,
          'message' => 'Parametros invalidos enviados en la peticion',
          'data' => null
        ];
      }
      $municipio->fill($data);
      $municipio->save();
      return [
        'responseCode' => 200,
        'message' => 'Municipio actualizado correctamente',
        'data' => $municipio
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
      $municipio = Municipio::find($id);
      if (!$municipio) {
        return [
          'responseCode' => 404,
          'message' => 'Municipio no encontrado',
          'data' => null
        ];
      }
      $municipio->delete();
      return [
        'responseCode' => 200,
        'message' => 'Municipio eliminado',
        'data' => $municipio
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

