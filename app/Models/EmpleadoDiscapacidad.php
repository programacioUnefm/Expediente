<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoDiscapacidad extends Model
{
  use HasFactory;
  protected $table = 'empleado_discapacidad';
  
  protected $fillable = [
    'cedula',
    'tipo_discapacidad_id',
    'registrado'
  ];

  public function empleado()
  {
      return $this->belongsTo(Empleado::class);
  }
  
  public function tipo_discapacidades()
  {
    return $this->belongsTo(TipoDiscapacidad::class);
  }

}
