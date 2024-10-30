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
  private $estados;

  public function __construct(ResponseFormatter $handlingResponse, EstadosService $estados)
  {
    $this->handlingResponse = $handlingResponse;
    $this->estados = $estados;
  }

  public function index(){
    $response = $this->estados->index();
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

  public function store(EstadosRequest $request){
    $response = $this->estados->store($request);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

  public function update(EstadosRequest $request,$id){
    $response = $this->estados->update($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }
  public function destroy(Request $request,$id){
    $response = $this->estados->destroy($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

}
