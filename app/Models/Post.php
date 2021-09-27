<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Relacion uno a muchos (inversa)
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    // Relacion muchos a muchos 

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    // Relacion uno a uno Polimorfica

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }
}
