<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        session(['active_menu' => 'developer']);
        return view('developer.property.indexproperty');
    }
    public function indexaddproperty()
    {
        session(['active_menu' => 'developer']);
        return view('developer.property.addproperty');
    }
}
