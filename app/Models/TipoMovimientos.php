<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMovimientos extends Model
{
    use HasFactory;
    protected $table = 'tipo_movimientos';
    protected $fillable = [
      'movimientos',
    ];

    public function movimiento(){
      return $this->hasMany(Movimientos::class);
    }
}
