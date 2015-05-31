<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        View::composer('profile', 'App\Http\ViewComposers\ProfileComposer');

        View::composer(['profile', 'home'], 'App\Http\ViewComposers\ProfileComposer');

        // Attaching a composer to all views by using Closure based composers
        View::composer('*', function($view)
        {

        });

        //Multiple Composers
        View::composers([
            'App\Http\ViewComposers\AdminComposer' => ['admin.index', 'admin.profile'],
            'App\Http\ViewComposers\UserComposer' => 'user',
            'App\Http\ViewComposers\ProductComposer' => 'product'
        ]);

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}