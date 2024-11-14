<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Banner_detail extends Model
{
    protected $table = 'banner_detail';
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'name',
        'description',
        'image',
    ];
}
