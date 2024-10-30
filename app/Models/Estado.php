<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $table = 'estados';
    protected $fillable = [
      'estado',
      'pais_id',
      'region'
    ];
  public function paises()
  {
      return $this->belongsTo(Pais::class);
  } 

  public function municipio()
  {
      return $this->hasMany(Municipio::class);
  } 
}
