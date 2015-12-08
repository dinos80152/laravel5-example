<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Events\UserRegistered;
use App\Jobs\SendReminderEmail;
use Event;

class UserController extends Controller
{

    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        $user = User::create($data);
        Event::fire(new UserRegistered($user));
    }

    public function sendReminderEmail(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->dispatch(new SendReminderEmail($user));

        // specify the queue
        $this->dispatch(new SendReminderEmail($user))->onQueue('emails');

        // delay job
        $this->dispatch(new SendReminderEmail($user))->delay(60);
    }
}