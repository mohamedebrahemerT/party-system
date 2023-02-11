<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypesOfExpenses extends Model
{
    use HasFactory;
     
    protected $table = 'types_of_expenses';
    protected $fillable = [
'name_ar',
'name_en',
   


    ];
}
