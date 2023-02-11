<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminNotification extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'user_id','admin_id', 'message'
    ];

    protected $casts = [
        'user_id' => 'integer',
         
    ];
 


    public function user() {
        return $this->hasOne(\App\Models\admin::class, 'id', 'admin_id');
    }
     
}
