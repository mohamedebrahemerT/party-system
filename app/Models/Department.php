<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = [
    'name',
    'parent',
    'photo'
    ];

        public function parents() 
        {
        return $this->hasMany('App\Models\Department', 'id', 'parent');
        }
}
