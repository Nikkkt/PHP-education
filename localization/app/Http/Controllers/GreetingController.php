<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class GreetingController extends Controller
{
    public function index()
    {
        return view('greeting');
    }

    public function setLocale($locale)
    {
        if (in_array($locale, ['en', 'uk'])) {
            App::setLocale($locale);
            session()->put('locale', $locale);
        }
        return redirect()->route('greeting');
    }
}
