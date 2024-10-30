<?php

namespace App\Http\Controllers\api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\NivelProfesionalRequest;
use App\Services\NivelProfesionalService;
use Illuminate\Http\Request;

class NivelProfesionalController extends Controller
{
  private ResponseFormatter $handlingResponse;
  private $nivelProfesional;
  public function __construct(ResponseFormatter $handlingResponse, NivelProfesionalService $nivelProfesional)
  {
    $this->handlingResponse = $handlingResponse;
    $this->nivelProfesional = $nivelProfesional;
  }

  public function index(){
    $response = $this->nivelProfesional->index();
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

  public function store(NivelProfesionalRequest $request){
    $response = $this->nivelProfesional->store($request);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

  public function update(NivelProfesionalRequest $request,$id){
    $response = $this->nivelProfesional->update($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }
  public function destroy(Request $request,$id){
    $response = $this->nivelProfesional->destroy($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }
}
