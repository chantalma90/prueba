<?php

namespace App\Services;

use App\User;
use App\Providers\MailerProvider;

class NotificationService
{
    
    protected $mailerProvider;

    public function __construct(MailerProvider $mailerProvider) {
        $this->mailerProvider = $mailerProvider;
    }

    public function notify(User $user, $message) {

        $result = $this->mailerProvider->send($user->email, $message);
        return $result;
    }

}