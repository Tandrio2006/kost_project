<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('developer.property.indexinvoice');
    }
    public function indexaddinvoice()
    {

        return view('developer.property.addinvoice');
    }
    // public function getlistinvoice()
    // {
    //     try {
    //         $query = DB::table('invoice')
    //         ->select('id', 'no_invoice', 'harga_pricelist', 'tanggal_buat', 'tanggal_pembukuan', 'status_pembayaran')

    //         ->get();

    //         if (!isset($request->order[0]) || !isset($request->columns[$request->order[0]['column']]['data'])) {
    //             $customers->orderBy('id', 'desc');
    //         } else {
    //             $column = $request->columns[$request->order[0]['column']]['data'];
    //             $direction = $request->order[0]['dir'];
    //             $customers->orderBy($column, $direction);
    //         }

    //         return DataTables::of($query)
    //             ->addColumn('action', function ($row) {
    //                 return '<a href="#" class="btn btn-sm btn-primary mr-1">
    //                             <i class="fas fa-edit"></i> Edit
    //                         </a>
    //                         <button data-id="' . $row->id . '" class="btn btn-sm btn-danger delete-customer">
    //                             <i class="fas fa-trash-alt"></i> Delete
    //                         </button>';
    //             })
    //             ->rawColumns(['action'])
    //             ->escapeColumns([])
    //             ->make(true);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'error' => $e->getMessage()
    //         ], 500);
    //     }
    // }
}
