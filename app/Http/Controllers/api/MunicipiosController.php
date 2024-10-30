<?php

namespace App\Http\Controllers\api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\MunicipiosRequest;
use App\Services\MunicipiosService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MunicipiosController extends Controller
{
  private ResponseFormatter $handlingResponse;
  private $municipioService;

  public function __construct(ResponseFormatter $handlingResponse, MunicipiosService $municipioService)
  {
    $this->handlingResponse = $handlingResponse;
    $this->municipioService = $municipioService;
  }

  public function index(){
    $response = $this->municipioService->index();
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

  public function results($nData)
  {
    $response = $this->municipioService->results($nData);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

  public function store(MunicipiosRequest $request){
    $response = $this->municipioService->store($request);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

  public function update(MunicipiosRequest $request,$id){
    $response = $this->municipioService->update($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }
  public function destroy(Request $request,$id){
    $response = $this->municipioService->destroy($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }
}
