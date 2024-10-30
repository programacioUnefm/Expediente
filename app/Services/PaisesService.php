<?php
namespace App\Services;

use App\Models\Pais;
use Exception;
use Illuminate\Support\Facades\Log;

class PaisesService{
  public function index()
  {
    try {
      $paises = Pais::all();
      $response = $paises->map(function($paises){
        return [
          'id' => $paises->id,
          'pais' => $paises->pais,
        ];
      });
      return [
        'responseCode' => 200,
        'message' => 'Lista de paises',
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
      $paises = Pais::create([
        'pais' => $request->pais
      ]);
      $response['pais'] =  $paises->pais;
      return [
        'responseCode' => 200,
        'message' => 'Pais Registrado',
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
      $pais = Pais::find($id);
      if (!$pais) {
        return [
          'responseCode' => 404,
          'message' => 'Pais no encontrado',
          'data' => null
        ];
      }
      $data = $request->only(['pais']);
      if(empty($data))
      {
        return [
          'responseCode' => 404,
          'message' => 'Parametros invalidos enviados en la solicitud',
          'data' => null
        ];
      }
      $pais->fill($data);
      $pais->save();
      return [
        'responseCode' => 200,
        'message' => 'Pais actualizado correctamente',
        'data' => $pais
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
      $pais = Pais::find($id);
      if (!$pais) {
        return [
          'responseCode' => 404,
          'message' => 'Pais no encontrado',
          'data' => null
        ];
      }
      elseif($pais->id == 1){
        return [
          'responseCode' => 404,
          'message' => 'El pais (Venezuela) no se puede borrar',
          'data' => null
        ];
      }
      $pais->delete();
      return [
        'responseCode' => 200,
        'message' => 'Pais borrado correctamente',
        'data' => $pais
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






// use GuzzleHttp\Client;

// $client = new Client();
// $response = $client->request('GET', 'https://api-gateway-url/api/servicio-b/endpoint', [
//     'headers' => [
//         'Authorization' => 'Bearer ' . env('INTERNAL_SERVICE_TOKEN'),  // Token interno
//         'X-Service-Request' => true,  // Header para identificar la petición interna
//     ],
// ]);

// $data = json_decode($response->getBody(), true);