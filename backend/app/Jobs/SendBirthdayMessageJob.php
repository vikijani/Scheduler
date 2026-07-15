<?php
namespace App\Jobs;

use App\Models\User;
use App\Mail\BirthdayMail;
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
        $email = $this->user->email;
        $phone = $this->user->phone;

        if ($email) {
            Mail::to($email)->send(new BirthdayMail($this->user));
        } else {
            logger("Happy Birthday {$this->user->name}");
        }



    }
}
