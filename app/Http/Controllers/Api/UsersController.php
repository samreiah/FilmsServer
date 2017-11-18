<?php

namespace App\Http\Controllers\Api;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Http\Requests\CreateUserRequest;

use App\Repositories\UserRepository;

class UsersController extends Controller
{
    
    public function __construct(UserRepository $user) {
        $this->user = $user;
    }

    public function getUser(Request $request) {

        if($request->user()) {
            return $this->respondWithSuccess('LOGGEDIN_USER',"", $request->user()->toArray());
        } else {
            return $this->respondNotFound("NO_USER");
        }
    }

    public function registerUser(CreateUserRequest $request) {
        
        try {

            $user = $this->user->createUser($request);

            if($user) {
                return $this->respondWithSuccess('USER_CREATED',"User Created Successfully.", $user->toArray());
            } else {
                return $this->respondInternalError('SIGNUP_ERROR','The System couldn\'t create the user');
            }
            
        } catch (Exception $e) {
            return $this->respondInternalError('INTERNAL_ERROR','Some Internal Error Occured');
        }
    }

}
