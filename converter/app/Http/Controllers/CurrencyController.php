<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Currency;

class CurrencyController extends Controller
{
    public function convert(Request $request)
    {
        $amount = $request->input('amount');
        $from = $request->input('from');
        $to = $request->input('to');

        try {
            $convertedAmount = Currency::convert($amount, $from, $to);
            return response()->json(['converted_amount' => $convertedAmount]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
