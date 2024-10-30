<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CargaFamiliar extends Model
{
    use HasFactory;
    protected $table = 'carga_familiares';
    protected $fillable = [
      'empleado_id',
      'cedula_fam',
      'nombre1',
      'nombre2',
      'apellido1',
      'apellido2',
      'nacimiento',
      'sexo',
      'parentesco',
      'tipo_discapacidad_id',
      'registrado',
      'fallecimiento'      
    ];

    
    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
    public function tipo_discapacidades()
    {
      return $this->belongsTo(TipoDiscapacidad::class);
    }  
}
