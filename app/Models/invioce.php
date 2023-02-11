<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class invioce extends Model
{
    use HasFactory;

     protected $table = 'invioces';
    protected $fillable = [
        'customer_name',
'Statement',
'Quantity',
'price',
'total',
'vate',
'total_afetr_vate',
'date',
'time',
'reference_no'
    ];



}
