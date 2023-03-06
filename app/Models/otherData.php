<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class otherData extends Model
{
    use HasFactory;

    protected $table='other_data';
    protected $fillable = ['id','member_id', 'input_key','input_value'];
}
