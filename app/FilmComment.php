<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilmComment extends Model
{

    protected $table = 'film_comments';


    public function user() {
        return $this->belongsTo('App\User');
    }

    public function film() {
        return $this->belongsTo('App\Film');
    }
}