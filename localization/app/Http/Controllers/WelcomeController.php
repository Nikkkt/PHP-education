<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\App;

class WelcomeController extends Controller
{
    public function index()
    {
        $locale = App::getLocale();
        $welcomeMessage = Cache::remember("welcome_{$locale}", now()->addMinutes(5), function () use ($locale) {
            return __("messages.welcome");
        });

        return view('welcome', compact('welcomeMessage'));
    }
}
