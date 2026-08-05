<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kerjasama;

class KerjasamaController extends Controller
{

    public function index()
    {

        $kerjasama = Kerjasama::latest()->paginate(10);

        return view('admin.kerjasama.index', compact('kerjasama'));

    }



    public function create()
    {

        return view('admin.kerjasama.create');

    }



    public function store(Request $request)
    {
        // validate simplified input: name, years, kriteria, skala, and optional logo
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_mulai' => 'required|integer|min:1900|max:2100',
            'tahun_berakhir' => 'nullable|integer|min:1900|max:2100|gte:tahun_mulai',
            'kriteria' => 'required|integer|in:1,2,3,4,5',
            'skala' => 'required|string|in:Lokal,Nasional,Internasional',
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $data['logo'] = 'images/' . $fileName;
        }

        Kerjasama::create($data);

        return redirect('/admin/kerjasama');
    }



    public function edit($id)
    {

        $kerjasama = Kerjasama::findOrFail($id);

        return view('admin.kerjasama.edit', compact('kerjasama'));

    }



    public function update(Request $request, $id)
    {
        $kerjasama = Kerjasama::findOrFail($id);

        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'tahun_mulai' => 'required|integer|min:1900|max:2100',
            'tahun_berakhir' => 'nullable|integer|min:1900|max:2100|gte:tahun_mulai',
            'kriteria' => 'required|integer|in:1,2,3,4,5',
            'skala' => 'required|string|in:Lokal,Nasional,Internasional',
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // hapus logo lama jika ada
            if (!empty($kerjasama->logo) && file_exists(public_path($kerjasama->logo))) {
                unlink(public_path($kerjasama->logo));
            }
            
            $file = $request->file('logo');
            $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $data['logo'] = 'images/' . $fileName;
        }

        $kerjasama->update($data);

        return redirect('/admin/kerjasama');
    }



    public function destroy($id)
    {

        Kerjasama::findOrFail($id)->delete();

        return back();

    }

}