<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Member_detail extends Model
{
    protected $table = 'member_detail';
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'designation',
        'description',
        'image',
    ];
}
