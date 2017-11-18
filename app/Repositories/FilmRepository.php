<?php
namespace App\Repositories;

use Crypt;
use Session;

use Auth;

use \Cviebrock\EloquentSluggable\Services\SlugService;
use App\Film;
use App\FilmComment;

class FilmRepository 
{

	public function __construct()
    {

    }

    public function createSlug($name) {

        return SlugService::createSlug(Film::class, 'slug', $name);
    }

    public function getFilms() {

        return Film::paginate(1);
    }

    public function getFilmBySlug($request) {

        return Film::where('slug', $request->slug)->with(['genres', 'comments', 'comments.user'])->first();
    }

    public function addFilm($request) {

        $film               = new Film();
        $film->name         = $request->name;
        $film->description  = $request->description;
        $film->released_on  = $request->released_on;
        $film->rating       = $request->rating;
        $film->ticket_price = $request->ticket_price;
        $film->country      = $request->country;

        $film->save();
        
        return $film;
    }


    public function addComment($request) {

        $filmComment = new FilmComment();
        $filmComment->description = $request->comment;
        $filmComment->film_id = $request->film_id;
        $filmComment->user_id = $request->user()->id;

        $filmComment->save();

        return FilmComment::where('id', $filmComment->id)->with('user')->first();
    }
}
