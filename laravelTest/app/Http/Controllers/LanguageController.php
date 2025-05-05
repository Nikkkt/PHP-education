<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function changeLanguage(string $locale): RedirectResponse
    {
//        dd($locale);
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
