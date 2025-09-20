<?php

namespace App\Http\Controllers;

use App\Models\aset;
use App\Models\aset_tetap_lainnya;
use App\Models\gedung_dan_bangunan;
use App\Models\jalan_irigasi_dan_jaringan;
use App\Models\kontruksi_dalam_pengerjaan;
use App\Models\pengadaan;
use App\Models\peralatan_dan_mesin;
use App\Models\tanah;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch counts for each asset type
        $totalTanah = Tanah::count();
        $totalPeralatan = peralatan_dan_mesin::count();
        $totalGedung = gedung_dan_bangunan::count();
        $totalJalan = jalan_irigasi_dan_jaringan::count();
        $totalAsetL = aset_tetap_lainnya::count();
        $totalKontruksi = kontruksi_dalam_pengerjaan::count();
        // $totalPengadaan = pengadaan::count();
        $totalAset = aset::count();
        // $totalAnggaran = DB::table('aset')->sum('nilai_perolehan');

        // Fetch procurement data for the last 12 months
        $chartData = DB::table('pengadaan')
            ->join('detail_pengadaan', 'pengadaan.id', '=', 'detail_pengadaan.id_pengadaan')
            ->join('aset', 'detail_pengadaan.id_aset', '=', 'aset.id')
            ->selectRaw('
        EXTRACT(MONTH FROM pengadaan.tanggal_pengadaan) as bulan,
        EXTRACT(YEAR FROM pengadaan.tanggal_pengadaan) as tahun,
        COUNT(detail_pengadaan.id) as jumlah_pengadaan,
        SUM(aset.nilai_perolehan) as total_anggaran
    ')
            ->where('pengadaan.tanggal_pengadaan', '>=', now()->subMonths(12))
            ->groupBy('tahun', 'bulan')
            ->orderBy('tahun', 'asc')
            ->orderBy('bulan', 'asc')
            ->get();

        // Initialize arrays for the last 12 months
        $labels = collect();
        $totalJumlah = collect();
        $totalAnggaran = collect();
        $startDate = now()->subMonths(11)->startOfMonth();
        for ($i = 0; $i < 12; $i++) {
            $monthYear = $startDate->copy()->addMonths($i);
            $month = $monthYear->month;
            $year = $monthYear->year;
            $data = $chartData->firstWhere(function ($row) use ($month, $year) {
                return $row->bulan == $month && $row->tahun == $year;
            });
            $labels->push($monthYear->translatedFormat('M Y'));
            $totalJumlah->push($data ? $data->jumlah_pengadaan : 0);
            $totalAnggaran->push($data ? $data->total_anggaran : 0);
        }

        // Pass data to view
        return view('dashboard', compact(
            'totalTanah',
            'totalPeralatan',
            'totalGedung',
            'totalJalan',
            'totalAsetL',
            'totalKontruksi',
            // 'totalPengadaan',
            'totalAset',
            'labels',
            'totalJumlah',
            'totalAnggaran'
        ));
    }
}
