<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KostPaymentController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('kost.kostpayment.indexkostpayment');
    }
    public function indexaddpaymentkost()
    {

        return view('kost.kostpayment.addkostpayment');
    }
}
