<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\SendEmail::class,
        \App\Console\Commands\InterActive::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('inspire')->cron('* * * * *');

        //minute, ex: everyMinute(), everyFiveMinute, everyTenMinute, everyThirtyMinute
        $schedule->command('inspire')->everyMinute();

        //hourly
        $schedule->exec('php -r "echo 123;"')->hourly();

        //daily, daily(), dailyAt('09:00'), twiceDaily(1, 13)
        $schedule->command('email:send 1')
                ->daily()
                ->runsInEnvironment('local');

        //weekly
        $schedule->call(function () {
            echo "Lazy Monday";
        })->weekly()->mondays()->at('09:00');

        $schedule->call(function () {
            echo "Lazy Monday";
        })->weeklyOn(1, '09:00');

        $schedule->call(function () {
            echo "Lazy Monday";
        })->days([1, 3, 5]);

        //monthly
        $schedule->command('inspire')->monthly();

        //yearly
        $schedule->command('inspire')->yearly();

        //when
        $schedule->command('email:send')->everyMinute()->when(function () {
            return true;
        });

        //overlap
        $schedule->command('email:send')->withoutOverlapping();

        //output
        $schedule->command('inspire')
                ->everyMinute()
                ->sendOutputTo('storage/app/inspire.app')
                ->emailOutputTo('foo@example.com');

        //hooks
        $schedule->command('emails:send')
                ->daily()
                ->before(function () {
                    // Task is about to start...
                })
                ->after(function () {
                    // Task is complete...
                });

        /**
         * ping urls
         * have to insall Guzzle HTTP
         * "guzzlehttp/guzzle": "~5.3|~6.0"
         */
        $url = 'http://www.google.com';
        $schedule->command('emails:send')
                ->daily()
                ->pingBefore($url)
                ->thenPing($url);

    }
}
