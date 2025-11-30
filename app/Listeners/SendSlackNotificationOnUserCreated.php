<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendSlackNotificationOnUserCreated
{
    private const MESSAGE = 'New User Created: *%s* (%s) has been added to the system.';
    public function handle(UserCreated $event): void
    {
        $name = $event->user->first_name . ' ' . $event->user->last_name;
        $email = $event->user->email;

        $message = sprintf(self::MESSAGE, $name, $email);

        // Disabled since we do not actually want to do this.
        // Http::post(env('SLACK_WEBHOOK_URL'), ['text' => $message]);
        Log::info($message);
    }
}
