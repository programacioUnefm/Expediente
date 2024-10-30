<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
    use HasFactory;
    protected $table = 'dependencias';
    protected $fillable = [
     'dependencia',
     'parroquia_id'
  ];

  public function parroquia(){
    return $this->belongsTo(Parroquia::class);
  }

  public function area(){
    return $this->hasMany(Parroquia::class);
  }
}
