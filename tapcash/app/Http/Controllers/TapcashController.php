<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tapcash;
use App\Models\Tipe;

class TapcashController extends Controller
{
    public function dashboard()
    {
        $query = Tapcash::query();
        if (request('no_tapcash')) {
            $query->where('no_tapcash', 'like', '%' . request('no_tapcash') . '%');
        }
        if (request('uid')) {
            $query->where('uid', 'like', '%' . request('uid') . '%');
        }
        if (request('tipe')) {
            $query->where('tipe', 'like', '%' . request('tipe') . '%');
        }
        if (request('tanggal_expired')) {
            $query->where('tanggal_expired', 'like', '%' . request('tanggal_expired') . '%');
        }
        if (request('nama')) {
            $query->where('nama', 'like', '%' . request('nama') . '%');
        }
        if (request('npp')) {
            $query->where('npp', 'like', '%' . request('npp') . '%');
        }
        if (request('keterangan')) {
            $query->where('keterangan', 'like', '%' . request('keterangan') . '%');
        }
        if (request('perusahaan')) {
            $query->where('perusahaan', 'like', '%' . request('perusahaan') . '%');
        }
        if (request('status')) {
            $query->where('status', 'like', '%' . request('status') . '%');
        }
        $tapcash = $query->get();
        return view('dashboard', compact('tapcash'));
    }

    public function masterTipe()
    {
        $tipe = Tipe::all();
        return view('master_tipe', compact('tipe'));
    }

    public function tambahTapcash()
    {
        $tipe = Tipe::all();
        return view('tambah_tapcash', compact('tipe'));
    }

    public function storeTapcash(Request $request)
    {
        $request->validate([
            'no_tapcash' => 'required|unique:tapcash,no_tapcash',
            'uid' => 'required|unique:tapcash,uid',
            'npp' => 'required|unique:tapcash,npp',
            // ...validasi lain jika perlu
        ], [
            'no_tapcash.unique' => 'No Tapcash sudah digunakan.',
            'uid.unique' => 'UID sudah digunakan.',
            'npp.unique' => 'NPP sudah digunakan.',
        ]);
        Tapcash::create($request->all());
        return redirect('/dashboard');
    }

    public function storeTipe(Request $request)
    {
        Tipe::create($request->all());
        return redirect('/master-tipe');
    }

    public function destroyTipe($id)
    {
        Tipe::destroy($id);
        return redirect('/master-tipe');
    }

    public function editTapcash($id)
    {
        $tapcash = Tapcash::findOrFail($id);
        $tipe = Tipe::all();
        return view('edit_tapcash', compact('tapcash', 'tipe'));
    }

    public function updateTapcash(Request $request, $id)
    {
        $tapcash = Tapcash::findOrFail($id);
        $request->validate([
            'no_tapcash' => 'required|unique:tapcash,no_tapcash,' . $id,
            'uid' => 'required|unique:tapcash,uid,' . $id,
            'npp' => 'required|unique:tapcash,npp,' . $id,
        ], [
            'no_tapcash.unique' => 'No Tapcash sudah digunakan.',
            'uid.unique' => 'UID sudah digunakan.',
            'npp.unique' => 'NPP sudah digunakan.',
        ]);
        $tapcash->update($request->all());
        return redirect('/dashboard');
    }

    public function destroyTapcash($id)
    {
        Tapcash::destroy($id);
        return redirect('/dashboard');
    }
        // Export data Tapcash ke CSV
        public function downloadExcel()
        {
            $tapcash = Tapcash::all();
            $filename = 'tapcash_export_' . date('Ymd_His') . '.csv';
            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=$filename",
            ];
            $columns = ['no_tapcash', 'uid', 'tipe', 'tanggal_expired', 'nama', 'npp', 'keterangan', 'perusahaan', 'status'];
            $headerNames = ['No Tapcash', 'Uid', 'Tipe', 'Tanggal Expired', 'Nama', 'Npp', 'Keterangan', 'Perusahaan', 'Status'];
            $callback = function() use ($tapcash, $columns, $headerNames) {
                $file = fopen('php://output', 'w');
                fputcsv($file, $headerNames);
                foreach ($tapcash as $row) {
                    $data = [];
                    foreach ($columns as $col) {
                        $data[] = $row[$col];
                    }
                    fputcsv($file, $data);
                }
                fclose($file);
            };
            return response()->stream($callback, 200, $headers);
        }
}
