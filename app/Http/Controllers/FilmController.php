<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use App\Models\Actor;
use App\Models\Review;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all();
        return view('film.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();
        return view('film.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'summary' => 'required|string|max:3000',
            'release_year' => 'required|numeric',
            'poster' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre_id' => 'required|exists:genres,id'
        ]);

        $path = $request->file('poster')->store('images', 'public');

        Film::create([
            'title' => $request->title,
            'summary' => $request->summary,
            'release_year' => $request->release_year,
            'poster' => $path,
            'genre_id' => $request->genre_id,
        ]);

        return redirect()->route('film.index')->with('success', 'Film created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $film = Film::find($id);

        if(!$film){
            abort(404);
        }

        return view('film.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $film = Film::find($id);
        $genres = Genre::all();

        if(!$film){
            abort(404);
        }

        return view('film.edit', compact('film', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'summary' => 'required|string|max:3000',
            'release_year' => 'required|numeric',
            'poster' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $film = Film::find($id);

        $path = $film->poster;

        if ($request->hasFile('poster')) {
            $path = $request->file('poster')->store('images', 'public');
            if ($film->poster) {
                unlink('storage/' . $film->poster);
            }
        }

        Film::where('id', $id)->update([
            'title' => $request->title,
            'summary' => $request->summary,
            'release_year' => $request->release_year,
            'poster' => $path,
            'genre_id' => $request->genre_id,
        ]);

        return redirect()->route('film.index')->with('success', 'Film updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        $actors = Actor::where('film_id', $id)->get();
        $reviews = Review::where('film_id', $id)->get();
        foreach ($actors as $actor) {
            $actor->delete();
        }
        foreach ($reviews as $review) {
            $review->delete();
        }
        if ($film->poster) {
            unlink('storage/' . $film->poster);
        }
        $film->delete();
        return redirect()->route('film.index')->with('success', 'Film deleted successfully.');
    }
}
