<?php

namespace App\Http\Controllers;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('log', ['only' => ['store', 'update']]);

        $this->middleware('subscribed', ['except' => ['store', 'update']]);
    }

    public function index()
    {

    }

    public function show()
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function getPopular()
    {

    }
}