<?php

namespace Nikit\SlimTest\Http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public function index(Request $request, Response $response, $args = []): Response
    {
        $hello = "Привіт Одеса! з контролера";
        return view($response, 'home.index', ['hello' => $hello]);
    }

    public function show(Request $request, Response $response, string $name): Response
    {
        $hello = "Привіт Одеса! з контролера url-path: $name";
        return view($response, 'home.index', compact('hello'));
    }
}