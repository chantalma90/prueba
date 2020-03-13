<?php

namespace App\Providers;

class SmtpProvider implements MailerProvider
{
    public function send($email, $message) {
        return true;
    }
}