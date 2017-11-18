<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Film extends Model
{
    use Sluggable;

    protected $table = 'films';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    public function genres() {
        return $this->belongsToMany('App\Genre', 'film_genres');
    }

    public function comments() {
        return $this->hasMany('App\FilmComment','film_id');
    }

    /**
     * Accessor to Always check if file exists if not exists send default file
    */
    public function getPhotoAttribute($value) {
        if(file_exists(public_path('images/films/' . $value))) {
            return $value;
        } else {
            return 'default.jpg';
        }
    }
}
