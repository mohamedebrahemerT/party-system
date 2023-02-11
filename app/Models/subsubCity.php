<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsubCity extends Model
{
    use HasFactory;

       protected $table = 'subsub_cities';
    protected $fillable = [
        
'name',
'code',
'city_id',
'subCity_id'
     
    ];

     public function City() 
      {
        return $this->hasOne(\App\Models\City::class, 'id', 'city_id');
    }

     public function subCity() 
      {
        return $this->hasOne(\App\Models\subCity::class, 'id', 'subCity_id');
    }
}
