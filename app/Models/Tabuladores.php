<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabuladores extends Model
{
  use HasFactory;
  protected $table = 'tabuladores';
  protected $fillable = [
    'cod',
    'nombre',
    'fecha',
    'actual',
    'reconversion',
  ];

  public function sueldos(){
    return $this->hasMany(Sueldos::class);
  }
}
