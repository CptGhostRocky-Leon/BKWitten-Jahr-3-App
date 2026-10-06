<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    /**
     * Get all published information.
     */
    public function index()
    {
        $informationen = Information::with('anhaenge')
            ->where('status', 'veroeffentlicht')
            ->latest('veroeffentlicht_am')
            ->get();

        return response()->json([
            'data' => $informationen,
        ]);
    }

    /**
     * Get a single published information.
     */
    public function show(Information $information)
    {
        if ($information->status !== 'veroeffentlicht') {
            return response()->json([
                'message' => 'Information nicht gefunden.',
            ], 404);
        }

        $information->load('anhaenge');

        return response()->json([
            'data' => $information,
        ]);
    }

    /**
     * Create a new information.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titel' => ['required', 'string', 'max:255'],
            'nachricht' => ['required', 'string'],
        ]);

        $information = Information::create([
            'titel' => $validated['titel'],
            'nachricht' => $validated['nachricht'],
            'status' => 'veroeffentlicht',
            'ist_wichtig' => false,
            'veroeffentlicht_am' => now(),
            'autor_id' => auth()->id(),
        ]);

        return response()->json([
            'data' => $information,
        ], 201);
    }
}