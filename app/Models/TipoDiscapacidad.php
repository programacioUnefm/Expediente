<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDiscapacidad extends Model
{
    use HasFactory;
    protected $table = 'tipo_discapacidades';
    protected $fillable = [
      'discapacidad'
    ];
    public function empleado_discapacidad()
    {
        return $this->hasMany(EmpleadoDiscapacidad::class);

    } 

    public function carga_familiares()
    {
        return $this->hasMany(CargaFamiliar::class);
    } 
}
