<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dedicaciones extends Model
{
  use HasFactory;
  protected $table = 'dedicaciones';
  protected $fillable = [
    'dedicacion',
    'dedicacion_corta',
    'horas',
  ];

  public function personal_empleado(){
    return $this->hasMany(PersonalEmpleado::class);
  }

  public function sueldos(){
    return $this->hasOne(Sueldos::class);
  }

  
}
