<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Service_detail extends Model
{
    protected $table = 'service_detail';
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'image_title',
        'description',
        'image',
    ];
}
