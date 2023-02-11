<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suppliers extends Model
{
    use HasFactory;

      protected $table = 'suppliers';
    protected $fillable = [
  'name',
'image',
'company_name',
'vat_number',
'email',
'phone',
'address',
'status',
    ];
}
