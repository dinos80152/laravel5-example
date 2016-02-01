<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionController extends Controller
{
    public function index()
    {
        session()->set('language','tw');
        return session()->all();
    }
}
