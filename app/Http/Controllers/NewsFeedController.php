<?php

namespace App\Http\Controllers;

use App\Models\Information;

class NewsFeedController extends Controller
{
    public function index()
    {
        $informationen = Information::query()
            ->orderByDesc('veroeffentlicht_am')
            ->with('anhaenge')
            ->get();
            
        return view('newsfeed', [
            'informationen' => $informationen,
        ]);
    }
}