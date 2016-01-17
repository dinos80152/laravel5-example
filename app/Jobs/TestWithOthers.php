<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestWithOthers extends Job ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /**
         * The release method accepts one argument:
         * the number of seconds you wish to wait until the job is made available again
         */
        if ($condition) {
            $this->release(10);
        }

        /**
         * check the number of attempts that have been made to run the job using the attempts method
         */
        if ($this->attempts() > 3) {
            //
        }
    }

    public function failed()
    {
        // Called when the job is failing...
    }
}
