<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::saving(function ($obj) {
            $obj->slug = str()->slug($obj->name_tm);
        });
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function images()
    {
        return $this->hasMany(NewsImage::class)
            ->orderBy('id');
    }


    public function isNew()
    {
        if ($this->created_at >= Carbon::now()->subMonth()->toDateTimeString()) {
            return true;
        } else {
            return false;
        }
    }


    public function getName()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en ?: $this->name_tm;
        } elseif (app()->getLocale() == 'ru'){
            return $this->name_ru ?: $this->name_tm;
        } else {
            return $this->name_tm;
        }
    }


    public function getImage()
    {
        return $this->image ? Storage::url('n/' . $this->image) : asset('img/news.jpg');
    }


    public function status()
    {
        if ($this->is_visible == 0) {
            return trans('app.not-visible');
        } else {
            return trans('app.visible');
        }
    }

    public function statusColor()
    {
        if ($this->is_visible == 0) {
            return 'danger';
        } else {
            return 'success';
        }
    }

}
