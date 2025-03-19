<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

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
    public function getlistproperty(){
        try {
            $query = Property::with('propertyStatus', 'salesperson', 'paymentMethod');

            return DataTables::of($query)
                ->addColumn('action', function ($row) {
                    return ' <a class="btn btnUpdateProperty btn-sm btn-secondary text-white" ><i class="fas fa-edit"></i></a>
                         <a class="btn btnDestroyProperty btn-sm btn-danger text-white" data-id="' . $row->id . '"><i class="fas fa-trash"></i></a>';
                })
                ->rawColumns(['action'])
                ->escapeColumns([])
                ->make(true);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }

    }
}
