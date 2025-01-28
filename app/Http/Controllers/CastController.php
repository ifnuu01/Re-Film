<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use App\Models\Actor;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casts = Cast::all();
        return view('cast.index', compact('casts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cast.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'age' => 'required|numeric|min:1',
            'bio' => 'required|string'
        ]);

        Cast::create([
            'name' => $request->name,
            'age' => $request->age,
            'bio' => $request->bio
        ]);

        return redirect()->route('cast.index')->with('success', 'Cast created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cast = Cast::find($id);
        if (!$cast) {
            abort(404);
        }
        return view('cast.show', compact('cast'));        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $cast = Cast::find($id);
        if (!$cast) {
            abort(404);
        }
        return view('cast.edit', compact('cast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'age' => 'required|numeric|min:1',
            'bio' => 'required|string'
        ]);

        $cast = Cast::find($id);
        if (!$cast) {
            abort(404);
        }

        $cast->update([
            'name' => $request->name,
            'age' => $request->age,
            'bio' => $request->bio
        ]);
        return redirect()->route('cast.index')->with('success', 'Cast updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cast = Cast::find($id);
        $actors = Actor::where('cast_id', $id)->get();

        if ($actors->count() > 0) {
            return redirect()->route('cast.index')->with('error', 'Cannot delete this cast because it has actors.');
        }

        if (!$cast) {
            abort(404);
        }
        $cast->delete();
        return redirect()->route('cast.index')->with('success', 'Cast deleted successfully.');
    }
}
