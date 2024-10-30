<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalEmpleado extends Model
{
  use HasFactory;

  protected $table = 'personal_empleado';
  protected $fillable = [
    'cedula',
    'tipo_personal_id',
    'condicion_id',
    'dedicacion_id',
    'tipo_jornada_id',
    'area_id',
    'manucargo_id',
    'fecha_ingreso',
    'fecha_antiguedad',
  ];

  public function condiciones(){
    return $this->belongsTo(Condiciones::class);
  }

  public function tipo_jornada(){
    return $this->belongsTo(TipoJornada::class);
  }

  public function dedicaciones(){
    return $this->belongsTo(Dedicaciones::class);
  } 
  
  public function tipo_personal(){
    return $this->belongsTo(Dedicaciones::class);
  }

  public function area()
  {
    return $this->belongsTo(Area::class);
  }
  
  public function movimientos()
  {
    return $this->hasMany(Movimientos::class);
  }

  public function manucargo()
  {
    return $this->belongsTo(Manucargo::class);
  }
}
