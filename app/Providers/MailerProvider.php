<?php

namespace App\Providers;

interface MailerProvider
{
    public function send($email, $message);
}