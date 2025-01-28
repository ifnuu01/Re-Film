<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'point' => 'required|numeric|min:1|max:5',
            'content' => 'required|string|max:3000',
            'film_id' => 'required|exists:films,id'
        ]);

        Review::create([
            'film_id' => $request->film_id,
            'point' => $request->point,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
            'film_id' => $request->film_id
        ]);

        return redirect()->route('film.show', $request->film_id)->with('success', 'Review created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
