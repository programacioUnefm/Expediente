<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uniformes extends Model
{
    use HasFactory;
    protected $table = 'uniformes';
    protected $fillable = [
      'cedula',
      'empleado_id',
      'talla'
    ];

    public function empleado()
  {
      return $this->belongsTo(Empleado::class);
  } 

  public function prendas()
  {
    return $this->belongsTo(Prendas::class);
  }
}
