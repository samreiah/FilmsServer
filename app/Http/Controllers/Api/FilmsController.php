<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Repositories\FilmRepository;

use App\Http\Requests\GetFilmBySlugRequest;
use App\Http\Requests\AddFilmRequest;
use App\Http\Requests\AddCommentRequest;

class FilmsController extends Controller
{

    public function __construct(FilmRepository $film) {
        $this->film = $film;
    }

    public function getFilms(Request $request) {

        $films = $this->film->getFilms();
        
        if($films && !empty($films->toArray()['data'])) {

            return $this->respondWithSuccess('Films Found',"Films Found.", $films);

        } else if(empty($films->toArray()['data'])) {
            
            return $this->respondNotFound('NOT FOUND', 'No Films Found');

        } else {

            return $this->respondInternalError('INTERNAL ERROR','The System couldn\'t fetch the films');
        }
    }

    public function getFilm(GetFilmBySlugRequest $request) {

        $film = $this->film->getFilmBySlug($request);
       
        if($film) {
            
            return $this->respondWithSuccess('Film Found',"Film Found.", $film->toArray());

        } else if($film == null) {
            
            return $this->respondNotFound('NOT FOUND', 'No Film Found with the slug '.$request->slug);

        } else {

            return $this->respondInternalError('INTERNAL ERROR','The System couldn\'t fetch the film');
        }
    }

    public function addFilm(AddFilmRequest $request) {

        $film = $this->film->addFilm($request);

        try {
            
            $film = $this->film->addFilm($request);

            if($film) {
                return $this->respondWithSuccess('FILM_ADDED',"Film Added Successfully.", $film->toArray());
            } else {
                return $this->respondInternalError('ADDITION_ERROR','The System couldn\'t add a film');
            }
            
        } catch (Exception $e) {
            return $this->respondInternalError('INTERNAL_ERROR','Some Internal Error Occured');
        }
    }


    public function addComment(AddCommentRequest $request) {
        
        $comment = $this->film->addComment($request);

        try {

            if($comment) {
                return $this->respondWithSuccess('COMMENT_ADDED',"Comment Added Successfully.", $comment);
            } else {
                return $this->respondInternalError('ADDITION_ERROR','The System couldn\'t add a comment');
            }

        } catch (Exception $e) {
            return $this->respondInternalError('INTERNAL_ERROR','Some Internal Error Occured');
        }
    }
}