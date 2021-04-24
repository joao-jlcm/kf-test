<?php

namespace App\Listeners;

use App\Events\CoopCreating;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetCoopStatus
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
     * @param  CoopCreated  $event
     * @return void
     */
    public function handle(CoopCreating $event)
    {
        $event->coop->setAttribute('status', 'draft');
    }
}
