<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    use HasFactory;
      protected $table = 'expenses';
    protected $fillable = [
'car_id',
'TypesOfExpenses_id',
'value',
'desc',
    ];

     public function car() {
        return $this->hasOne(\App\Models\Cars::class, 'id', 'car_id');
    }

     public function TypesOfExpense() {
        return $this->hasOne(\App\Models\TypesOfExpenses::class, 'id', 'TypesOfExpenses_id');
    }
}
