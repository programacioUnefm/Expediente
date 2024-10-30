<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudios extends Model
{
  use HasFactory;
  protected $table = 'estudios';
  protected $fillable = [
    'empleado_id',
    'tipo_estudio_id',
    'inicio',
    'fin',
    'titulo',
    'numfolio',
    'registrado',
    'status',
    'horas_academicas'
  ];

  public function empleado()
  {
      return $this->belongsTo(Empleado::class);
  } 

  public function tipo_estudios()
  {
    return $this->belongsTo(TipoEstudios::class);
  }


}
