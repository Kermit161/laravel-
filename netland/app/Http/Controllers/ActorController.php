<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Media;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal alle acteurs op en geef ze door aan de view
        $actors = Actor::all();
        return view('actors.index', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Toon de form voor het aanmaken van een nieuwe actor
        return view('actors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer de input
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'sex' => 'required|string',
            'country' => 'required|string',
            'has_won_awards' => 'required|boolean',
        ]);

        // Maak de nieuwe actor aan
        $actor = Actor::create($validated);

        // Redirect naar de actor index
        return redirect()->route('actors.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Haal de actor op met bijbehorende media
        $actor = Actor::with('media')->findOrFail($id);
        
        // Toon de detailpagina van de actor
        return view('actors.show', compact('actor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Haal de actor op voor bewerken
        $actor = Actor::findOrFail($id);
        
        // Toon de form voor bewerken van de actor
        return view('actors.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valideer de input
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required|integer',
            'sex' => 'required|string',
            'country' => 'required|string',
            'has_won_awards' => 'required|boolean',
        ]);

        // Zoek de actor en werk deze bij
        $actor = Actor::findOrFail($id);
        $actor->update($validated);

        // Redirect naar de actor detailpagina
        return redirect()->route('actors.show', $actor->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Zoek de actor en verwijder deze
        $actor = Actor::findOrFail($id);
        $actor->delete();

        // Redirect naar de index
        return redirect()->route('actors.index');
    }
}

