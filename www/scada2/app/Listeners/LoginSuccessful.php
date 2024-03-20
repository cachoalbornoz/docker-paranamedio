<?php

namespace App\Listeners;

use Illuminate\Support\Carbon;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;

class LoginSuccessful
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  Login $event
     * @return void
     */
    public function handle(Login $event)
    {
        $event->user->update(['last_login' => Carbon::now()]);
    }
}
