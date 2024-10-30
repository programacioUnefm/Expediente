<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'municipios';

    protected $fillable = [
      'municipio',
      'capital',
      'estado_id'
    ];
    public function estados()
    {
      return $this->belongsTo(Estado::class);
    }
    public function parroquia()
    {
      return $this->hasMany(Parroquia::class);
    }

}
