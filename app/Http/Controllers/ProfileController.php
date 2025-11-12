<?php

namespace App\Http\Controllers;

use App\Profile;                // 👈 OJO: App\Profile (no App\Models\Profile)
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:profiles',
            'email'    => 'required|email|unique:profiles',
            'bio'      => 'nullable|string',
        ]);

        $profile = Profile::create($validated);
        return response()->json(['id' => $profile->id], 201);
    }

    public function show($id)
    {
        return response()->json(Profile::findOrFail($id), 200);
    }

    public function index()
    {
        return response()->json(Profile::all(), 200);
    }

    public function update(Request $request, $id)
    {
        $profile = Profile::findOrFail($id);

        $validated = $request->validate([
            'username' => 'sometimes|string|max:255|unique:profiles,username,'.$profile->id,
            'email'    => 'sometimes|email|unique:profiles,email,'.$profile->id,
            'bio'      => 'sometimes|nullable|string',
        ]);

        $profile->update($validated);
        return response()->json($profile, 200);
    }
}