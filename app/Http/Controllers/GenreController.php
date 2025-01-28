<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Film;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        Genre::create($request->all());
        return redirect()->route('genre.index')->with('success', 'Genre successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $genre = Genre::find($id);
        
        $films = Film::where('genre_id', $id)->get();

        if(!$genre || !$films){
            abort(404);
        }
        return view('genre.show', compact('genre', 'films'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $genre = Genre::find($id);

        if(!$genre){
            abort(404);
        }

        return view('genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $genre = Genre::find($id);
        $genre->update($request->all());
        return redirect()->route('genre.index')->with('success', 'Genre successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);
        $genre->delete();
        return redirect()->route('genre.index')->with('success', 'Genre successfully deleted');
    }
}
