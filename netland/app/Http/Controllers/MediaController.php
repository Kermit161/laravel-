<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Actor;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Haal alle media op en geef ze door aan de view
        $mediaItems = Media::all();
        return view('media.index', compact('mediaItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Haal alle acteurs op voor de create form
        $actors = Actor::all();
        return view('media.create', compact('actors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer de input
        $validated = $request->validate([
            'title' => 'required',
            'rating' => 'required|numeric',
            'length_in_minutes' => 'required|integer',
            'released_at' => 'required|date',
            'country_of_origin' => 'required|string',
            'youtube_trailer_id' => 'required|string',
            'summary' => 'nullable|string',
            'spoken_in_language' => 'required|string',
            'type' => 'required|string', // movie of series
            'actor_ids' => 'required|array', // Acteurs die je wilt koppelen aan het media-item
        ]);

        // Maak het nieuwe media-item aan
        $media = Media::create($validated);

        // Koppel de geselecteerde acteurs aan het media-item
        $media->actors()->attach($validated['actor_ids']);

        // Redirect naar de media index pagina
        return redirect()->route('media.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Haal het media-item op met bijbehorende acteurs
        $media = Media::with('actors')->findOrFail($id);

        // Toon de detailpagina van het media-item
        return view('media.show', compact('media'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Haal het media-item op voor bewerken
        $media = Media::findOrFail($id);
        // Haal alle acteurs op voor de edit form
        $actors = Actor::all();
        
        // Toon de edit pagina voor media
        return view('media.edit', compact('media', 'actors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valideer de input
        $validated = $request->validate([
            'title' => 'required',
            'rating' => 'required|numeric',
            'length_in_minutes' => 'required|integer',
            'released_at' => 'required|date',
            'country_of_origin' => 'required|string',
            'youtube_trailer_id' => 'required|string',
            'summary' => 'nullable|string',
            'spoken_in_language' => 'required|string',
            'type' => 'required|string',
            'actor_ids' => 'required|array', // Acteurs die je wilt koppelen aan het media-item
        ]);

        // Zoek het media-item en werk dit bij
        $media = Media::findOrFail($id);
        $media->update($validated);

        // Koppel de geselecteerde acteurs opnieuw aan het media-item
        $media->actors()->sync($validated['actor_ids']);

        // Redirect naar de media detailpagina
        return redirect()->route('media.show', $media->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Zoek het media-item en verwijder dit
        $media = Media::findOrFail($id);
        $media->delete();

        // Redirect naar de media index pagina
        return redirect()->route('media.index');
    }
}
