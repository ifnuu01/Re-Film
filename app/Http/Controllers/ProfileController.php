<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($user_id)
    {
        $profile = Profile::where('user_id', $user_id)->first();

        if (!$profile) {
            abort(404);
        }

        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id)
    {
        $request->validate([
            'age' => 'required|integer|min:1',
            'bio' => 'required|string'
        ]);

        $profile = Profile::where('user_id', $user_id)->first();
        $profile->update($request->all());
        return redirect()->route('profile.edit', $user_id)->with('success', 'Profile updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
