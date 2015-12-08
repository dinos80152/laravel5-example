<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $data = $request->except(['_token']);

        $user = User::create($data);
        Event::fire(new UserRegistered($user));
    }
}
