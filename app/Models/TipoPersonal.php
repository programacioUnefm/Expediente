<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPersonal extends Model
{
  use HasFactory;
  protected $table = 'tipo_personal';
  protected $fillable = [
    'personal',
  ];

  public function personal_empleado () {
    return $this->hasMany(PersonalEmpleado::class);
  }

  public function sueldos(){
    return $this->hasOne(Sueldos::class);
  }
}