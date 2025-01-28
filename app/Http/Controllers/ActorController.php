<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Cast;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actors = Actor::all();
        return view('actor.index', compact('actors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $films = Film::all();
        $casts = Cast::all();

        return view('actor.create', compact('films', 'casts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cast_id' => 'required|exists:casts,id',
            'film_id' => 'required|exists:films,id'
        ]);

        Actor::create($request->all());

        return redirect()->route('actor.index')->with('success', 'Actor created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $actor = Actor::find($id);

        if (!$actor) {
            abort(404);
        }

        return view('actor.show', compact('actor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $actor = Actor::find($id);
        $films = Film::all();
        $casts = Cast::all();

        if (!$actor) {
            abort(404);
        }

        return view('actor.edit', compact('actor', 'films', 'casts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cast_id' => 'required|exists:casts,id',
            'film_id' => 'required|exists:films,id'
        ]);

        $actor = Actor::find($id);

        if (!$actor) {
            abort(404);
        }

        $actor->update($request->all());

        return redirect()->route('actor.index')->with('success', 'Actor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $actor = Actor::find($id);

        if (!$actor) {
            abort(404);
        }

        $actor->delete();

        return redirect()->route('actor.index')->with('success', 'Actor deleted successfully');
    }
}
