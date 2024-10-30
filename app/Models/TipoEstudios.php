<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEstudios extends Model
{
  use HasFactory;
  protected $table='tipo_estudios';
  protected $fillable = [
    'tipo_estudios'
  ];
    public function estudios()
    {
        return $this->hasMany(EmpleadoDiscapacidad::class);
    } 

}
