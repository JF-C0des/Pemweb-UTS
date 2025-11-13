<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'button_text',
        'button_link',
        'contact_text',
        'contact_subtext',
        'image_main',
        'shape_images',
        'is_active',
    ];

    protected $casts = [
        'shape_images' => 'array',
        'is_active' => 'boolean',
    ];
}
