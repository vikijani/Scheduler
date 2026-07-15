<?php

namespace App\Messages;

class SmsMessage
{
    public string $text;

    public function content(string $text): static
    {
        $this->text = $text;

        return $this;
    }
}
