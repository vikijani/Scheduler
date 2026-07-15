<?php

namespace App\Channels;

class SmsChannel
{
    public function send($notifiable, $notification): void
    {
        $message = $notification->toSms($notifiable);

        logger()->info(
            "SMS to {$notifiable->phone}: {$message->text}"
        );
    }
}
