<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        $user = User::create($data);

        // Facade
        Event::fire(new UserRegistered($user));
    }

    public function storeFireByHelper(Request $request)
    {
        $data = $request->except(['_token']);

        $user = User::create($data);

        // helper
        event(new UserRegistered($user));
    }
}
