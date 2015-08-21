<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommandController extends Controller
{
    public function command() {
        $exitCode = Artisan::call('email:send', [
            'user' => 1, '--queue' => 'default'
        ]);

        return $exitCode;
    }

    public function commandUseQueue() {
        Artisan::queue('email:send', [
            'user' => 1, '--queue' => 'default'
        ]);
    }

    public function commandPassBool() {
        $exitCode = Artisan::call('migrate:refresh', [
            '--force' => true,
        ]);
    }
}
