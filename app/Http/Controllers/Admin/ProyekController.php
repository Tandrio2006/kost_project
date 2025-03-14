<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;
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

        return view('developer.proyek.indexproyek');
    }
    public function getlistProyek(Request $request)
    {
        $txSearch = '%' . strtoupper(trim($request->txSearch)) . '%';

        $data = DB::table('proyeks')
            ->select('id', 'name', 'description')
            // ->where(function ($query) use ($txSearch) {
            //     $query->where(DB::raw('UPPER(nama_supir)'), 'LIKE', $txSearch)
            //         ->orWhere(DB::raw('UPPER(alamat_supir)'), 'LIKE', $txSearch)
            //         ->orWhere(DB::raw('UPPER(no_wa)'), 'LIKE', $txSearch);
            // })
            ->get();

        $output = '
            <table class="table table-hover table-bordered text-center rounded-lg shadow-sm" id="tableProyek">
                <thead style="background-color: #45a9ea; color: white;" width="100%">
                    <tr>
                        <th>Proyek</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';

        foreach ($data as $item) {
            $output .= '
                <tr>
                    <td>' . ($item->name ?? '-') . '</td>
                    <td>
                        <a class="btn btnUpdateProyek btn-sm btn-secondary text-white" data-id="' . $item->id . '" data-name="' . $item->name . '" data-description="' . $item->description . '"><i class="fas fa-edit"></i></a>
                         <a class="btn btnDestroyProyek btn-sm btn-danger text-white" data-id="' . $item->id . '"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>';
        }

        $output .= '</tbody></table>';
        return $output;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:proyeks,name',
            'description' => 'nullable|string|max:255',
        ]);

        $proyek = Proyek::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Proyek successfully added!',
            'proyek' => $proyek
        ]);
    }
    public function updateproyek(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:proyeks,name,' . $id,
            'description' => 'nullable|string|max:255',
        ]);

        try {

            $Proyek = Proyek::findOrFail($id);

            $Proyek->name = $request->input('name');
            $Proyek->description = $request->input('description');

            $Proyek->update();

            return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } catch (\Exception $e) {
            return response()->json(['error' => false, 'message' => 'Data gagal diperbarui']);
        }
    }

    public function show($id)
    {
        $Proyek = Proyek::findOrFail($id);
        return response()->json($Proyek);
    }
    public function deleteproyek($id){
        try {
            $proyek = Proyek::findOrFail($id);

            $proyek->delete();

            return response()->json(['status' => 'success', 'message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }
}

