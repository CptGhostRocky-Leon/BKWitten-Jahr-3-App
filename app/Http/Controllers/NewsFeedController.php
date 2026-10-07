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

    public function show(Information $information)
    {
        $information->load('anhaenge');

        return view('information.show', [
            'information' => $information,
        ]);
    }

    public function kategorie(string $kategorie)
    {
        $erlaubteKategorien = [
            'Veranstaltungen',
            'Angebote',
            'Organisatorisches',
        ];

        abort_unless(in_array($kategorie, $erlaubteKategorien, true), 404);

        $informationen = Information::query()
            ->where('kategorie', $kategorie)
            ->orderByDesc('veroeffentlicht_am')
            ->with('anhaenge')
            ->get();

        return view('newsfeed', [
            'informationen' => $informationen,
            'kategorie' => $kategorie,
        ]);
    }
}