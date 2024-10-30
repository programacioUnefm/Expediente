<?php

namespace App\Helpers;

use App\Models\Bitacora;

class BitacoraRecords
{
  public function bitacoraInserter($loggedUserId,$loggedUser,$modulo,$action,$ip_address,$details = null)
  {
    Bitacora::create([
      'user_id' => $loggedUserId,
      'username' => $loggedUser,
      'modulo' => $modulo,
      'action' => $action,
      'ip_address' => $ip_address,
      'details' => $details
    ]);
  }
}
