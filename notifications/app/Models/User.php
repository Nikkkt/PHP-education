<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'telegram_user_id',
        'notification_allowed',
    ];

    public function routeNotificationForTelegram()
    {
        return $this->telegram_user_id;
    }
}
