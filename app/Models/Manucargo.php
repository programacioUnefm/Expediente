<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manucargo extends Model
{
  use HasFactory;
  protected $table = 'manucargo';
  protected $fillable = [
    'codigo',
    'escala',
    'nivel',
    'cargo_categoria',
    'cargo_categoria_corta',
    'directivo',
    'codprog',
  ];

  public function personal_emppleado(){
    return $this->hasMany(PersonalEmpleado::class);
  }
}
