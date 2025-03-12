<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Proyek;

class ProyekController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $proyek = Proyek::all();

        return view('developer.proyek.indexproyek', compact('proyek'));
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'name' => 'required|string|max:255|unique:proyeks,name',
            'description' => 'nullable|string|max:255',
        ]);

        // Create new proyek
        $proyek = Proyek::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Return JSON response
        return response()->json([
            'status' => 'success',
            'message' => 'Proyek successfully added!',
            'proyek' => $proyek
        ]);
    }
}
