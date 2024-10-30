<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    protected $table = 'empleados';
    protected $fillable = [
      'documento',
      'cedula',
      'rif',
      'nombre1',
      'nombre2',
      'apellido1',
      'apellido2',
      'fecha_nacimiento',
      'email1',
      'email2',
      'telefono1',
      'telefono2',
      'sexo',
      'estado_civil',
      'peso',
      'altura',
      'sangre',
      'pais_nacimiento_id',
      'nivel_profesional_id',
      'parroquia_id'
  ];

  public function carga_familiar()
  {
    return $this->hasMany(CargaFamiliar::class);
  }

  public function nivel_profesional()
  {
    return $this->belongsTo(NivelProfesional::class);
  }

  public function estudios()
  {
    return $this->hasMany(Estudios::class);
  }

  public function uniformes()
  {
    return $this->hasMany(Uniformes::class);
  }

  public function empleado_discapacidad()
  {
    return $this->hasMany(EmpleadoDiscapacidad::class);
  }

  public function pais_nacimiento()
  {
    return $this->belongsTo(Pais::class);
  }

  public function parroquia()
  {
    return $this->belongsTo(Parroquia::class);
  }
}
