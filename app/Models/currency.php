<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class currency extends Model
{
    use HasFactory;
    protected $table = 'currencies';
    protected $fillable = [
   'name',
'code',
'exchange_rate',
'status'
    ];
    
}
