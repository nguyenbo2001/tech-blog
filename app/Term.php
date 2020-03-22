<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];

    public function category() {
        return $this->hasMany('App\Category');
    }

    public function post() {
        return $this->hasManyThrough('App\Post', 'App\Category');
    }

    // Delete foreign key
    public function delete() {
        $this->post()->delete();
        $this->category()->delete();
        return parent::delete();
    }
}
