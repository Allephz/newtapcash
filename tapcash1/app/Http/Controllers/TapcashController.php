<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tapcash;

class TapcashController extends Controller
{
       /**
        * Download Tapcash data as Excel (CSV).
        */
       public function downloadExcel()
       {
              $tapcash = \App\Models\Tapcash::all();
              $filename = 'tapcash_export_' . date('Ymd_His') . '.csv';
              $headers = [
                     'Content-Type' => 'text/csv',
                     'Content-Disposition' => "attachment; filename=$filename"
              ];
              $columns = ['no_tapcash', 'uid', 'tipe', 'tanggal_expired', 'nama', 'npp', 'keterangan', 'perusahaan', 'status'];
              $callback = function() use ($tapcash, $columns) {
                     $file = fopen('php://output', 'w');
                     fputcsv($file, $columns);
                     foreach ($tapcash as $row) {
                            fputcsv($file, [
                                   $row->no_tapcash,
                                   $row->uid,
                                   $row->tipe,
                                   $row->tanggal_expired,
                                   $row->nama,
                                   $row->npp,
                                   $row->keterangan,
                                   $row->perusahaan,
                                   $row->status
                            ]);
                     }
                     fclose($file);
              };
              return response()->stream($callback, 200, $headers);
       }
       /**
        * Update the specified Tapcash in storage.
        */
       public function updateTapcash(\Illuminate\Http\Request $request, $id)
       {
              $request->validate([
                     'no_tapcash' => 'required|string|max:255',
                     'uid' => 'required|string|max:255',
                     'tipe' => 'required|string|max:255',
                     'tanggal_expired' => 'required|date',
                     'nama' => 'required|string|max:255',
                     'npp' => 'required|string|max:255',
                     'keterangan' => 'nullable|string',
                     'perusahaan' => 'required|string|max:255',
              ]);
              $tapcash = \App\Models\Tapcash::findOrFail($id);
              $tapcash->no_tapcash = $request->no_tapcash;
              $tapcash->uid = $request->uid;
              $tapcash->tipe = $request->tipe;
              $tapcash->tanggal_expired = $request->tanggal_expired;
              $tapcash->nama = $request->nama;
              $tapcash->npp = $request->npp;
              $tapcash->keterangan = $request->keterangan;
              $tapcash->perusahaan = $request->perusahaan;
              // Set status otomatis berdasarkan tanggal_expired
              $today = date('Y-m-d');
              $tapcash->status = ($request->tanggal_expired < $today) ? 'EXPIRED' : 'ACTIVE';
              $tapcash->save();
              return redirect('/dashboard')->with('success', 'Tapcash berhasil diupdate.');
       }
       /**
        * Store a newly created Tapcash in storage.
        */
              public function storeTapcash(\Illuminate\Http\Request $request)
              {
                     $request->validate([
                            'no_tapcash' => 'required|string|max:255',
                            'uid' => 'required|string|max:255',
                            'tipe' => 'required|string|max:255',
                            'tanggal_expired' => 'required|date',
                            'nama' => 'required|string|max:255',
                            'npp' => 'required|string|max:255',
                            'keterangan' => 'nullable|string',
                            'perusahaan' => 'required|string|max:255',
                     ]);
                     $tapcash = new \App\Models\Tapcash();
                     $tapcash->no_tapcash = $request->no_tapcash;
                     $tapcash->uid = $request->uid;
                     $tapcash->tipe = $request->tipe;
                     $tapcash->tanggal_expired = $request->tanggal_expired;
                     $tapcash->nama = $request->nama;
                     $tapcash->npp = $request->npp;
                     $tapcash->keterangan = $request->keterangan;
                     $tapcash->perusahaan = $request->perusahaan;
                     // Set status otomatis berdasarkan tanggal_expired
                     $today = date('Y-m-d');
                     $tapcash->status = ($request->tanggal_expired < $today) ? 'EXPIRED' : 'ACTIVE';
                     $tapcash->save();
                     return redirect('/dashboard')->with('success', 'Tapcash berhasil ditambahkan.');
              }
       /**
        * Store a newly created Tipe in storage.
        */
       public function storeTipe(\Illuminate\Http\Request $request)
       {
              $request->validate([
                     'nama_tipe' => 'required|string|max:255',
              ]);
              $tipe = new \App\Models\Tipe();
              $tipe->nama_tipe = $request->nama_tipe;
              $tipe->save();
              return redirect('/master-tipe')->with('success', 'Tipe berhasil ditambahkan.');
       }
       /**
        * Remove the specified Tipe from storage.
        */
       public function destroyTipe($id)
       {
              $tipe = \App\Models\Tipe::findOrFail($id);
              $tipe->delete();
              return redirect('/master-tipe')->with('success', 'Tipe berhasil dihapus.');
       }
       /**
        * Show the form for editing the specified Tapcash.
        */
       public function editTapcash($id)
       {
              $tapcash = \App\Models\Tapcash::findOrFail($id);
              $tipe = \App\Models\Tipe::all();
              return view('edit_tapcash', compact('tapcash', 'tipe'));
       }
       public function index()
       {
          $tapcash = Tapcash::all();
          return view('daftar_tapcash', compact('tapcash'));
    }

    public function dashboard()
    {
           // Contoh data, sesuaikan dengan data asli Anda
           $tipeLabels = ['dinas kapal', 'kapal'];
           $tipeData = [4, 2];
           $statusLabels = ['ACTIVE', 'EXPIRED'];
           $statusData = [5, 1];

           return view('dashboard_main', compact('tipeLabels', 'tipeData', 'statusLabels', 'statusData'));
    }
        public function masterTipe()
        {
               $tipe = \App\Models\Tipe::all();
               return view('master_tipe', compact('tipe'));
        }

            public function tambahTapcash()
            {
                   $tipe = \App\Models\Tipe::all();
                   return view('tambah_tapcash', compact('tipe'));
            }
       /**
        * Remove the specified Tapcash from storage.
        */
       public function destroyTapcash($id)
       {
              $tapcash = \App\Models\Tapcash::findOrFail($id);
              $tapcash->delete();
              return redirect('/dashboard')->with('success', 'Tapcash berhasil dihapus.');
       }
}
