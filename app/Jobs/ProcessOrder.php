<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessOrder extends Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $productId;
    private $taxPercentage;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($productId, $taxPercentage)
    {
        $this->productId = $productId;
        $this->taxPercentage = $taxPercentage;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
