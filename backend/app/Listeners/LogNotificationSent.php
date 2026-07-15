<?php
namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Events\NotificationSent;

class LogNotificationSent
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
    public function handle(NotificationSent $event): void
    {
        if ($event->channel === 'mail') {

            Log::channel('mail')->info('Birthday email sent', [
                'user_id' => $event->notifiable->id,
                'name'    => $event->notifiable->name,
                'email'   => $event->notifiable->email,
            ]);

        }
    }
}
