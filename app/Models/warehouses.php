<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warehouses extends Model
{
    use HasFactory;
     protected $table = 'warehouses';
    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'status'
    ];
}
