<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramFile;
use NotificationChannels\Telegram\TelegramMessage;

class NewPostNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        $channels = ['mail'];
        if ($notifiable->telegram_user_id) {
            $channels[] = 'telegram';
        }
        return $channels;
    }

    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
            ->subject('New Post Published!')
            ->line('A new post has been published: ' . $this->post->title)
            ->line($this->post->content);

        if ($this->post->image) {
            $mail->attach(storage_path('app/public/' . $this->post->image));
        }

        return $mail;
    }

    public function toTelegram($notifiable)
    {
        $message = TelegramMessage::create()
            ->to($notifiable->telegram_user_id)
            ->content("*New Post Published!*\n\n*{$this->post->title}*\n{$this->post->content}");

        if ($this->post->image) {
            return TelegramFile::create()
                ->to($notifiable->telegram_user_id)
                ->content("*New Post Published!*\n\n*{$this->post->title}*\n{$this->post->content}")
                ->file(storage_path('app/public/' . $this->post->image), 'photo');
        }

        return $message;
    }
}
