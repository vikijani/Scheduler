<?php
namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Console\Jobs\SendBirthdayMessageJob;

#[Signature('app:check-birthdays')]
#[Description('Command description')]
class CheckBirthdays extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now();

        $users = User::whereMonth('birthday', $today->month)->whereDay('birthday', $today->day)->get();

        foreach ($users as $user) {
            SendBirthdayMessageJob::dispatch($user);
        }

        return Command::SUCCESS;
    }
}
