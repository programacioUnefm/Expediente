<?php

namespace App\Http\Controllers\api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaisesRequest;
use App\Services\PaisesService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaisesController extends Controller
{
  private ResponseFormatter $handlingResponse;
  private $paisesService;
  public function __construct(ResponseFormatter $handlingResponse, PaisesService $paisesService)
  {
    $this->handlingResponse = $handlingResponse;
    $this->paisesService = $paisesService;
  }

  public function index()
  {
    $response = $this->paisesService->index();
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }

  public function store(PaisesRequest $request)
  {
    $response = $this->paisesService->store($request);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }
  public function update(PaisesRequest $request,$id)
  {
    $response = $this->paisesService->update($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }
  public function destroy(Request $request,$id)
  {
    $response = $this->paisesService->destroy($request,$id);
    return $this->handlingResponse->sendResponse($response['responseCode'], $response['message'], $response['data']);
  }


}
