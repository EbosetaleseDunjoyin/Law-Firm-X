<?php

namespace App\Console\Commands;

use App\Models\Client;
use App\Notifications\PassportReminderClientNotification;
use Illuminate\Console\Command;

class PassportReminderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:passport-reminder-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminders to users without passport images';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $clientsWithoutProfileImage = Client::where('profile_image','default/profile.png')->get();

        foreach ($clientsWithoutProfileImage as $client) {
            $client->notify(new PassportReminderClientNotification($client->first_name));
        }
    }
}
