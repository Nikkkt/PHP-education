<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmails extends Command
{
    // Назва команди та її аргументи
    protected $signature = 'email:send {user}';

    // Опис команди
    protected $description = 'Send emails to a specific user';

    // Логіка команди
    public function handle()
    {
        $name = $this->ask('What is your name?');
        $send = $this->confirm('Do you want to send an email?');

        if ($send) {
            $this->info("Email sent to $name!");
        } else {
            $this->error('Email sending cancelled.');
        }
    }
}
