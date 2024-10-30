<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
  use HasFactory;
  protected $table = 'areas';

  protected $fillable = [
    'area',
    'dependencia_id'
  ];

  public function dependencia (){
  return $this->belongsTo(Dependencia::class);
  }

  public function personal_empleado (){
  return $this->hasMany(PersonalEmpleado::class);
  }
}
