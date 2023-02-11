<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subCity extends Model
{
    use HasFactory;

        protected $table = 'sub_cities';
    protected $fillable = [
        
'name',
'code',
'city_id',
     
    ];

     public function City() 
      {
        return $this->hasOne(\App\Models\City::class, 'id', 'city_id');
    }

}
