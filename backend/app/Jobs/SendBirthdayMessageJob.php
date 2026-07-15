<?php
namespace App\Jobs;

use App\Models\User;
use App\Mail\BirthdayMail;
use App\Notifications\BirthdayNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendBirthdayMessageJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(public User $user)
    {

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $this->user->notify(new BirthdayNotification());

    }
}
