<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $attributes = [
        'top' => 0
    ];

    public function next() {
        return Post::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public function previous() {
        return Post::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }

    public function scopeFeaturePost($query) {
        return $query->where('top', 1)->orderBy('views', 'desc');
    }

    public function scopeNewPost($query) {
        return $query->orderBy('created_at', 'desc');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function isTop() {
        return $this->top == 1 ? 'Có' : '';
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function comment() {
        return $this->hasMany('App\Comment');
    }
}
