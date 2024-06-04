<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::all()->map(function ($pengaduan) {
            $created_at = Carbon::parse($pengaduan->created_at);
            $updated_at = Carbon::parse($pengaduan->updated_at);
            $pengaduan->days_difference = $created_at->diffInDays($updated_at);
            return $pengaduan;
        });
        return view('back-end.pengaduans.index', compact('pengaduans'));
    }

    public function create()
    {
        return view('back-end.pengaduans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_hp' => 'required',
            'perihal' => 'required',
            // 'captcha' => 'required|simple_captcha',
        ]);

        Pengaduan::create($request->all());
        $data['nama'] = $data['nama'] ?? '-';
    $data['nomor_hp'] = $data['nomor_hp'] ?? '-';
        
             $request->validate([ '_answer' => 'required | simple_captcha' ]);
        
             return redirect()->back()->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function edit(Pengaduan $pengaduan)
    {
        return view('back-end.pengaduans.edit', compact('pengaduan'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            // 'nama' => 'required',
            // 'nomor_hp' => 'required',
            // 'perihal' => 'required',
            'status' => 'required',
        ]);

        $pengaduan->update($request->all());

        return redirect()->route('pengaduans.index')
                        ->with('success','Pengaduan berhasil diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()->route('pengaduans.index')
                        ->with('success','Pengaduan berhasil dihapus.');
    }
}

