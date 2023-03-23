<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    protected $casts = [
        'commented_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function news()
    {
        return $this->belongsTo(News::class);
    }


    public function status()
    {
        if ($this->is_approved == 0) {
            return trans('news.loading');
        } elseif ($this->is_approved == 1) {
            return trans('news.approved');
        } else {
            return trans('news.not_approved');
        }
    }

    public function statusColor()
    {
        if ($this->is_approved == 0) {
            return 'warning';
        } elseif ($this->is_approved == 1) {
            return 'success';
        } else {
            return 'danger';
        }
    }
}
