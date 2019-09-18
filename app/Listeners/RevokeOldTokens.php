<?php

namespace App\Listeners;

use Laravel\Passport\Events\AccessTokenCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Laravel\Passport\Client;
use Carbon\Carbon;

class RevokeOldTokens
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
     * @param  AccessTokenCreated  $event
     * @return void
     */
    public function handle(AccessTokenCreated $event)
    {
        $client = Client::find($event->clientId);
        $client->tokens()->where('created_at', '<', Carbon::now()->subDay())->forcedelete();

    }
}
