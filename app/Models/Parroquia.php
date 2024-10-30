<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parroquia extends Model
{
  use HasFactory;
  protected $table = 'parroquias';

  protected $fillable = [
    'parroquia',
    'municipio_id'
  ];
  public function municipio()
  {
    return $this->belongsTo(Municipio::class);
  }

  public function empleado()
  {
    return $this->hasMany(Empleado::class);
  }

  public function dependencia()
  {
    return $this->hasMany(Dependencia::class);
  }


}
