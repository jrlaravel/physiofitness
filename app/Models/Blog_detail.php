<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Blog_detail extends Model
{
    protected $table = 'blog_detail';
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'image_title',
        'description',
        'image',
    ];
}
