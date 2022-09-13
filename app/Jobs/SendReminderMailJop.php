<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\SendReminderMailNotification;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;

class SendReminderMailJop implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $users = User::where('type', 'user')
            ->get();  // 1

        Notification::send($users, new SendReminderMailNotification);

            // ->chunk(100, function($users) { // 2 with delay
            //     $i = 0;
            //     foreach($users as $user) {
            //         $user->notify(new SendReminderMailNotification)->delay(now()->addMinutes(1 /*$i*/));
            //         i++;
            //     }
            // });
    }
}
