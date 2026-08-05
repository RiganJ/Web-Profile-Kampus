<?php

namespace App\Http\Controllers;

use App\Models\Accreditation;
use Illuminate\Support\Facades\Storage;

class AccreditationController extends Controller
{
    public function index()
    {
        $accreditations = Accreditation::query()
            ->latest('tahun')
            ->latest('tanggal_sk')
            ->get();

        return view('akreditasi.index', compact('accreditations'));
    }

    public function file(Accreditation $accreditation)
    {
        abort_unless($accreditation->file && Storage::disk('public')->exists($accreditation->file), 404);

        return Storage::disk('public')->response($accreditation->file);
    }
}
