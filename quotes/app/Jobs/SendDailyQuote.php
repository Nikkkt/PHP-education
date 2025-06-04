<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Mail\DailyQuote;
use Illuminate\Support\Facades\Mail;

class SendDailyQuote implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $response = Http::get('https://api.quotable.io/random');
        $data = $response->json();

        $quote = $data['content'] ?? 'Stay positive and keep moving forward!';
        $author = $data['author'] ?? 'Unknown';

        foreach (User::all() as $user) {
            Mail::to($user->email)->queue(new DailyQuote($quote, $author));
        }
    }
}
