<?php

namespace App\Http\Controllers\api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\EstadosRequest;
use App\Services\EstadosService;
use Illuminate\Http\Request;

class EstadosController extends Controller
{
  private ResponseFormatter $handlingResponse;
  private $estadoService;

  public function __construct(ResponseFormatter $handlingResponse, EstadosService $estadoService)
  {
    $this->handlingResponse = $handlingResponse;
    $this->estadoService = $estadoService;
  }

  public function index(){
    $response = $this->estadoService->index();
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

  public function store(EstadosRequest $request){
    $response = $this->estadoService->store($request);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

  public function update(EstadosRequest $request,$id){
    $response = $this->estadoService->update($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }
  public function destroy(Request $request,$id){
    $response = $this->estadoService->destroy($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

}
