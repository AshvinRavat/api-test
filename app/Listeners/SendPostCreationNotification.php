<?php

namespace App\Listeners;

use App\Events\PostCreated;
use App\Mail\PostCreatedMail;
use Illuminate\Support\Facades\Mail;

class SendPostCreationNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreated $event): void
    {
        Mail::to('ahsivn@455.com')->send(new PostCreatedMail($event->user->name, $event->post->title));
    }
}
