<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $customer = Customer::all();

        return view('developer.customer.indexcustomer', compact('customer') );
    }

    public function create()
    {
        //
    }
}
