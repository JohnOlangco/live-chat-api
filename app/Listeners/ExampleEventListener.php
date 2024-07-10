<?php

namespace App\Listeners;

use App\Jobs\ExampleJob;
use App\Events\ExampleEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Support\Facades\Log;

class ExampleEventListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ExampleEvent  $event
     * @return void
     */
    public function handle(ExampleEvent $event) {
        Log::info('ExampleEventListener triggered', ['event', $event, 'data' => $event->data]);

        ExampleJob::dispatch($event->data)->onQueue('queue-default');
    }
}
