<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sueldos extends Model
{
  use HasFactory;
  protected $table = 'sueldos';
  protected $fillable = [
    'dedicacion_id',
    'hora',
    'sueldo',
    'tipo_personal_id',
    'tabulador_id',
  ];
  public function tabuladores(){
    return $this->belongsTo(Tabuladores::class);
  }
  public function dedicacion(){
    return $this->belongsTo(Dedicaciones::class);
  }
  public function tipo_personal(){
    return $this->belongsTo(TipoPersonal::class);
  }
}
