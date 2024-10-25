<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Appointment extends Model
{
    protected $table = 'appointment';
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'age',
        'message',
    ];
}
