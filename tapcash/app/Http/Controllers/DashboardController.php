<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tapcash;
use App\Models\Tipe;

class DashboardController extends Controller
{
    public function index()
    {
        // Grafik persentase tipe
        $tipeCounts = Tapcash::select('tipe')->get()->groupBy('tipe')->map->count();
        $tipeLabels = $tipeCounts->keys();
        $tipeData = $tipeCounts->values();

        // Grafik persentase status
        $statusCounts = Tapcash::select('status')->get()->groupBy('status')->map->count();
        $statusLabels = $statusCounts->keys();
        $statusData = $statusCounts->values();

        return view('dashboard_main', [
            'tipeLabels' => $tipeLabels,
            'tipeData' => $tipeData,
            'statusLabels' => $statusLabels,
            'statusData' => $statusData,
        ]);
    }
}
