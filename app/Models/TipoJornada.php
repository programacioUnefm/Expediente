<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoJornada extends Model
{
  use HasFactory;
  protected $table = 'tipo_jornada';
  protected $fillable = [
    'jornada',
  ];

  public function personal_empleado(){
    return $this->hasMany(PersonalEmpleado::class);
  }

}
