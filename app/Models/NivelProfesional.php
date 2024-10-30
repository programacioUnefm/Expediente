<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelProfesional extends Model
{
    use HasFactory;
    protected $table = 'nivel_profesional';
    protected $fillable = [
      'cod_nivel',
      'nivel_profesional',
      'nivel_profesional_corto',
      'pago'
  ];
  public function empleado()
  {
      return $this->hasMany(Empleado::class);
  }   
}
