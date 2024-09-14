<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class Logger implements ShouldQueue
{
    use Queueable;

    private $index;
    /**
     * Create a new job instance.
     */
    public function __construct(int $index)
    {
        $this->index = $index;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        echo "Log dispached ".$this->index;
        Log::info('Log dispached '.$this->index);
    }
}
