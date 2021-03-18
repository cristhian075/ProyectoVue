<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;



class UserController extends Controller
{
    public function current(){
        return Auth::user();
    }

    public function index()
    {
        $users = User::all();
        return [
           'users' => $users
        ];
    }

}
