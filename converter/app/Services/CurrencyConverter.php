<?php

namespace App\Services;

class CurrencyConverter
{
    private $rates = [
        'USD' => [
            'EUR' => 0.92,
            'UAH' => 36.5,
        ],
        'EUR' => [
            'USD' => 1.09,
            'UAH' => 39.5,
        ],
        'UAH' => [
            'USD' => 0.027,
            'EUR' => 0.025,
        ],
    ];

    public function convert($amount, $from, $to)
    {
        if (!isset($this->rates[$from][$to])) {
            throw new \Exception("Conversion rate not available for {$from} to {$to}");
        }

        $rate = $this->rates[$from][$to];
        return $amount * $rate;
    }
}
