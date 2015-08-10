<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Events\UserRegistered;
use Event;

class UserController extends Controller
{

    public function index()
    {

    }

    public function show()
    {

    }

    public function store(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);

        $user = User::create($data);
        Event::fire(new UserRegistered($user));
    }

    public function update()
    {

    }

    public function getPopular()
    {

    }
}