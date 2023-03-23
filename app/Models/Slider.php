<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $guarded = [
        'id'
    ];

    protected $fillable = [
        'header',
        'text',
        'link',
    ];


    public function getImage()
    {
        return $this->image ? Storage::url('slider/' . $this->image) : asset('img/slider1.jpg');
    }
}
