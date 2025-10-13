<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Tapcash;

class DashboardController extends Controller
{
    public function index()
    {
        // Get all Tapcash data
        $tapcash = Tapcash::all();

        // Group by tipe
        $tipeLabels = $tapcash->pluck('tipe')->unique()->values()->all();
        $tipeData = [];
        foreach ($tipeLabels as $label) {
            $tipeData[] = $tapcash->where('tipe', $label)->count();
        }

        // Group by status
        $statusLabels = $tapcash->pluck('status')->unique()->values()->all();
        $statusData = [];
        foreach ($statusLabels as $label) {
            $statusData[] = $tapcash->where('status', $label)->count();
        }

        return view('dashboard_main', compact('tipeLabels', 'tipeData', 'statusLabels', 'statusData'));
    }
}
