<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class whatsappSettings extends Model
{
    use HasFactory;

     protected $table = 'whatsapp_settings';
    protected $fillable = [
  'endpoint_url',
'BearerAuthorization',
'status',
'client_id',
'client_secret',
'grant_type',
    ];

  
}
