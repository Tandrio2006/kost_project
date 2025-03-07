<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('index');
        }

        return view('login.indexlogin');
    }

    public function ajaxLogin(Request $request)
    {
        $loginInput = $request->input('login'); 
        $password = $request->input('password');

        $loginField = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';

        if (Auth::attempt([$loginField => $loginInput, 'password' => $password])) {
            $request->session()->regenerate();
    
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil!',
                'redirect' => route('index')
            ]);
        }
    
        return response()->json([
            'error' => true,
            'message' => 'Email/Username atau Password salah!'
        ], 401);
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}