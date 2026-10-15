<?php

namespace App\Http\Controllers;

use App\Models\Price;

class HomeController extends Controller
{
    public function index()
    {
        $season = match (now()->month) {
            12, 1, 2 => 'winter',
            3, 4, 5  => 'spring',
            6, 7, 8  => 'summer',
            default  => 'autumn',
        };

        // Jos kauden kuvia ei ole vielä, käytetään syksyn kuvia
        if (!file_exists(public_path("kuvat/{$season}1.jpg"))) {
            $season = 'autumn';
        }

        $prices = Price::latest()->get();

        return view('welcome', compact('season', 'prices'));
    }
}