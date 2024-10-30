<?php

namespace App\Helpers;

class ResponseFormatter
{
  public function sendResponse($code, $message, $result)
  {
    $response = [
      'responseCode' => $code,
      'message' => $message,
      'data'    => $result,
    ];

    return response()->json($response, $code);
  }
}
