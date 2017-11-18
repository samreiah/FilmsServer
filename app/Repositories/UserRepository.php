<?php
namespace App\Repositories;

use Crypt;
use Session;
use Notification;
use Auth;
use Hash;

use App\User;

//use App\Notifications\UserCreated;
//use App\Notifications\EmailVerificationLink;

class UserRepository 
{

	public function __construct()
    {
        
    }

    public function createUser($request) {

        $user                   = new User();
        $user->name             = $request->name;
        $user->email            = $request->email;

        if($request->password) {
            $user->password     = bcrypt($request->password);
        }
        
        $user->save();

        return $user;

    }

}
