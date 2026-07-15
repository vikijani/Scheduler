<?php
namespace App\Channels;

use Illuminate\Support\Facades\Log;

class SmsChannel
{
    public function send($notifiable, $notification): void
    {
        $message = $notification->toSms($notifiable);

        Log::channel('sms')->info(
            "SMS to {$notifiable->phone}: {$message->text}"
        );
    }
}
