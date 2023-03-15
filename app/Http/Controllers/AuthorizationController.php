<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class AuthorizationController extends Controller
{
    /*  --> gate authorization using middleware in route
    public function index()
    {
        return "Worked for Admin";
    }*/

    public function index()
    {
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        //return "Authorization";
        return "Worked for Admin";
    }
}
