<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'position_en',
        'position_ar',
        'company',
        'content_en',
        'content_ar',
        'image',
        'rating',
        'featured',
        'order',
        'status',
    ];

    protected $casts = [
        'rating' => 'integer',
        'featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function getPositionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->position_ar : $this->position_en;
    }

    public function getContentAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->content_ar : $this->content_en;
    }
}
