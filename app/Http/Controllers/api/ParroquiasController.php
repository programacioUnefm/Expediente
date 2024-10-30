<?php

namespace App\Http\Controllers\api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParroquiasRequest;
use App\Services\ParroquiasService;
use Illuminate\Http\Request;

class ParroquiasController extends Controller
{
  private ResponseFormatter $handlingResponse;
  private $parroquiaService;

  public function __construct(ResponseFormatter $handlingResponse, ParroquiasService $parroquiaService)
  {
    $this->handlingResponse = $handlingResponse;
    $this->parroquiaService = $parroquiaService;
  }

  public function index(){
    $response = $this->parroquiaService->index();
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }
  public function results($nData)
  {
    $response = $this->parroquiaService->results($nData);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }
  public function store(ParroquiasRequest $request){
    $response = $this->parroquiaService->store($request);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

  public function update(ParroquiasRequest $request,$id){
    $response = $this->parroquiaService->update($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }
  public function destroy(Request $request,$id){
    $response = $this->parroquiaService->destroy($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

}
