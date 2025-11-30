<?php

namespace App\Listeners;

use App\Events\UserUpdated;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SendSlackNotificationOnUserUpdated
{
    private const MESSAGE = 'User Updated: *%s* (%s) received modifications in the system.';
    public function handle(UserUpdated $event): void
    {
        $name = $event->user->first_name . ' ' . $event->user->last_name;
        $email = $event->user->email;

        $message = sprintf(self::MESSAGE, $name, $email);

        // Disabled since we do not actually want to do this.
        // Http::post(env('SLACK_WEBHOOK_URL'), ['text' => $message]);
        Log::info($message);
    }
}
