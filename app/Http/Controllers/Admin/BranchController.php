<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        session(['active_menu' => 'kost']);
        return view('kost.branch.indexbranch');
    }
    public function indexaddbranch()
    {
        session(['active_menu' => 'kost']);
        return view('kost.branch.addbranch');
    }
}
