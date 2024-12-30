<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function ml()
    {
        // Mengembalikan view form untuk Mobile Legends
        return view('game.ml'); // Pastikan ada file game/ml.blade.php
    }

    public function ff()
    {
        return view('game.ff'); // Halaman form Free Fire
    }

    public function pubg()
    {
        return view('game.pubg'); // Halaman form PUBG
    }

    public function hok()
    {
        return view('game.hok'); // Halaman form PUBG
    }

    public function genshin()
    {
        return view('game.genshin'); // Halaman form PUBG
    }

    public function bola()
    {
        return view('game.bola'); // Halaman form PUBG
    }
}
