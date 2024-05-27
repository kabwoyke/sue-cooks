<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'description',
        'duration',
        'price',
        'thumbnail_url',
        'video_url'
    ];
}
