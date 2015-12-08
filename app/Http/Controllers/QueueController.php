<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderEmail;
use App\Jobs\Test;
use App\Jobs\TestWithModel;
use App\Jobs\TestWithRequest;
use App\Jobs\TestWithFailed;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QueueController extends Controller
{

    public function index()
    {
        $this->dispatch(new Test);

        return 'add queue';
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $this->dispatch(new TestWithModel($user));
        return $user . 'add queue';
    }

    public function store(Request $request)
    {

        $this->dispatchFrom('App\Jobs\TestWithRequest', $request);

        $this->dispatchFrom('App\Jobs\TestWithRequest', $request, [
            'name' => 'DinoLai',
        ]);
    }

    public function fail()
    {
        $this->dispatch(new TestWithFailed);
        return 'failed add queue';
    }

    public function others($id)
    {

        // specify the queue
        $this->dispatch(new TestWithOthers)->onQueue('emails');

        // delay job
        $this->dispatch(new TestWithOthers)->delay(60);        
    }

}