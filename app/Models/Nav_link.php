<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Nav_link extends Model
{
    protected $table = 'nav_link';
    use HasFactory, Notifiable;

    protected $fillable = [
        'instagram_url',
        'facebook_url',
        'youtube_url',
        'address',
        'phone',
        'email',
    ];
}
