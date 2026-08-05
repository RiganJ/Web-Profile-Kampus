<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use App\Models\Mitra;
use App\Models\Beasiswa;
use App\Models\Civitas;
use App\Models\GuruBesar;
use App\Models\Prodi;
use App\Models\Fakultas;
use App\Models\AdminActivity;
use App\Services\SourceCodeAuditService;
use DB;

class DashboardController extends Controller
{
    public function index(SourceCodeAuditService $sourceCodeAuditService)
    {
        $sourceCodeAuditService->check();

        $jumlahMahasiswa = Mahasiswa::count();
        $jumlahDosen = Dosen::count();
        $jumlahMitra = Mitra::count();
        $jumlahBeasiswa = Beasiswa::count();
        $jumlahCivitas = Civitas::count();
        $jumlahGuruBesar = GuruBesar::count();
        $jumlahProdi = Prodi::count();
        $jumlahFakultas = Fakultas::count();

        $dosenTerbaru = Dosen::with('prodi')->latest()->take(5)->get();
        $mahasiswaTerbaru = Mahasiswa::latest()->take(5)->get();

        $mahasiswaPerTahun = Mahasiswa::select(
            DB::raw('angkatan as tahun'),
            DB::raw('count(*) as total')
        )
        ->whereNotNull('angkatan')
        ->groupBy('tahun')
        ->orderBy('tahun', 'asc')
        ->get();

        $activityQuery = AdminActivity::latest('performed_at');

        if (! auth()->user()->isSuperAdmin()) {
            $activityQuery->where('user_id', auth()->id());
        }

        $aktivitasTerbaru = $activityQuery->take(10)->get();



        return view('admin.dashboard', compact(
            'jumlahMahasiswa',
            'jumlahDosen',
            'jumlahMitra',
            'jumlahBeasiswa',
            'jumlahCivitas',
            'jumlahGuruBesar',
            'jumlahProdi',
            'jumlahFakultas',
            'dosenTerbaru',
            'mahasiswaPerTahun',
            'mahasiswaTerbaru',
            'aktivitasTerbaru'
        ));
    }
}
