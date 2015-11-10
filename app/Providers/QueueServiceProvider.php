<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class QueueServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         * If you would like to register an event that will be called when a queued job fails,
         * you may use the Queue::failing method.
         * This event is a great opportunity to notify your team via e-mail or HipChat.
         */
        Queue::failing(function ($connection, $job, $data) {
            // Notify team of failing job...
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
