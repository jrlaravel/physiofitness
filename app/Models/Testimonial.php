<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Testimonial extends Model
{
    protected $table = 'testimonial';
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'video',
        'problem',
        'review',
    ];
}
