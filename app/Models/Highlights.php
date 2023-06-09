<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlights extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    protected static function booted()
    {
        static::saving(function ($obj) {
            $obj->slug = str()->slug($obj->name_tm);
        });
    }


    public function news()
    {
        return $this->hasMany(News::class)
            ->orderBy('id', 'desc');
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
}
