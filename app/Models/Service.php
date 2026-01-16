<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_en',
        'title_ar',
        'slug',
        'description_en',
        'description_ar',
        'content_en',
        'content_ar',
        'icon',
        'image',
        'featured',
        'order',
        'meta_title_en',
        'meta_title_ar',
        'meta_description_en',
        'meta_description_ar',
        'status',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function getTitleAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->title_ar : $this->title_en;
    }

    public function getDescriptionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->description_ar : $this->description_en;
    }

    public function getContentAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->content_ar : $this->content_en;
    }

    public function getMetaTitleAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->meta_title_ar : $this->meta_title_en;
    }

    public function getMetaDescriptionAttribute()
    {
        return app()->getLocale() === 'ar' ? $this->meta_description_ar : $this->meta_description_en;
    }
}
