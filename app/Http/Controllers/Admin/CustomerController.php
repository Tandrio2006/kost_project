<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\CustomerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Validation\Rule;
use Yajra\DataTables\Facades\DataTables;
use function Laravel\Prompts\select;

class CustomerController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $listtype = CustomerType::select('id', 'name')->get();
        $salespersons = Customer::where('customer_type_id', 2)->select('id', 'name')->get();

        return view('developer.customer.indexcustomer', [
            'listtype' => $listtype,
            'salespersons' => $salespersons
        ]);
    }
    public function gelistcustomer(Request $request)
    {
        try {
            $customers = Customer::with(['customerType', 'salesperson', 'customerUnits.property']);

            if (!isset($request->order[0]) || !isset($request->columns[$request->order[0]['column']]['data'])) {
                $customers->orderBy('id', 'desc');
            } else {
                $column = $request->columns[$request->order[0]['column']]['data'];
                $direction = $request->order[0]['dir'];
                $customers->orderBy($column, $direction);
            }

            return DataTables::of($customers)
                ->addColumn('customer_type', function ($row) {
                    return $row->customerType ? $row->customerType->name : '-';
                })
                ->addColumn('salesperson', function ($row) {
                    return $row->salesperson ? $row->salesperson->name : '-';
                })
                ->addColumn('properties', function ($row) {
                    $properties = $row->customerUnits->map(function ($unit) {
                        return $unit->property ? $unit->property->name : null;
                    })->filter()->implode('; ');
                    return $properties ?: '-';
                })
                ->addColumn('action', function ($row) {
                    return '<a href="#" data-id="' . $row->id . '"  class="btn btn-sm btn-primary mr-1 edit-customer">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <button data-id="' . $row->id . '" class="btn btn-sm btn-danger delete-customer">
                                <i class="fas fa-trash-alt"></i> Delete
                            </button>';
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


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'no_ktp' => 'nullable|string|max:50|unique:customers,no_ktp',
            'alias' => 'nullable|string|max:255',
            'no_hp' => 'required|string|max:20',
            'no_hp2' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255|unique:customers,email',
            'customer_type_id' => 'required|exists:customer_types,id',
            'unit' => 'nullable|string|max:255',
            'salesperson_id' => 'nullable|exists:customers,id',
            'keywords' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        try {
            $customer = Customer::create([
                'name' => $request->name,
                'company_name' => $request->company_name,
                'title' => $request->title,
                'no_ktp' => $request->no_ktp,
                'alias' => $request->alias,
                'no_hp' => $request->no_hp,
                'no_hp2' => $request->no_hp2,
                'email' => $request->email,
                'customer_type_id' => $request->customer_type_id,
                'salesperson_id' => $request->salesperson_id,
                'keywords' => $request->keywords,
                'notes' => $request->notes,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Customer berhasil ditambahkan!',
                'data' => $customer
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function destroy($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            $customer->delete();

            return response()->json([
                'success' => true,
                'message' => 'Customer berhasil dihapus!'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat menghapus data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id)
    {
        try {
            $customer = Customer::findOrFail($id);
            return response()->json([
                'success' => true,
                'data' => $customer
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Customer tidak ditemukan.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {

        $id = (int)$id;

        $request->validate([
            'name' => 'required|string|max:255',
            'company_name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'no_ktp' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('customers', 'no_ktp')->ignore($id, 'id'),
            ],
            'alias' => 'nullable|string|max:255',
            'no_hp' => 'required|string|max:20',
            'no_hp2' => 'nullable|string|max:20',
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('customers', 'email')->ignore($id, 'id'),
            ],
            'customer_type_id' => 'required|exists:customer_types,id',
            'salesperson_id' => 'nullable|exists:customers,id',
            'keywords' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        try {
            $customer = Customer::findOrFail($id);
            $customer->update([
                'name' => $request->name,
                'company_name' => $request->company_name,
                'title' => $request->title,
                'no_ktp' => $request->no_ktp,
                'alias' => $request->alias,
                'no_hp' => $request->no_hp,
                'no_hp2' => $request->no_hp2,
                'email' => $request->email,
                'customer_type_id' => $request->customer_type_id,
                'salesperson_id' => $request->salesperson_id,
                'keywords' => $request->keywords,
                'notes' => $request->notes,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Customer berhasil diperbarui!',
                'data' => $customer
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
