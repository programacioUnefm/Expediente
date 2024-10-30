<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    use HasFactory;
    protected $table = 'movimientos';
    protected $fillable = [
      'personal_empleado_id',
      'tipo_movimiento',
      'num_mov',
      'fecha_inicio',
      'fecha_fin',
      'cargado',
      'responsable',
      'observaciones',
      'num_folio'
    ];

  public function tipo_movimiento()
  {
      return $this->belongsTo(TipoMovimientos::class);
  }
  public function personal_empleado()
  {
    return $this->belongsTo(PersonalEmpleado::class);
  }
}
