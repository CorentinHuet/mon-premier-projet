<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PingPongControleur extends Controller
{
    public function ping()
    {
        return view('ping', ['word' => 'PING']);
    }

    public function pong()
    {
        return view('pong', ['word' => 'PONG']);
    }
}
