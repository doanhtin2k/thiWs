<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\SuccessEvent;
use App\Mail\SuccessMail;
use Illuminate\Support\Facades\Mail;
class SendMailSuccess
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
     * @param  object  $event
     * @return void
     */
    public function handle(SuccessEvent $event)
    {
        //
        Mail::to($event->email)->send(new SuccessMail($event->username, $event->email, $event->rank));
        // dd($event->username);
    }
}
