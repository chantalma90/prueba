<?php

namespace App\Providers;

class SesProvider implements MailerProvider
{
    public function send($email, $message) {
        return false;
    }
}