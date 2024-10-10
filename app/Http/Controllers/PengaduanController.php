<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pengaduans = Pengaduan::with('user')->get(); // Mengambil semua pengaduan beserta informasi pengguna yang menginputnya
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
        'photos' => 'nullable|array|max:5', // Memastikan ini adalah array dan maksimal 5 foto
        'photos.*' => 'image|mimes:jpg,jpeg,png|max:2048', // Validasi untuk setiap foto
    ]);

    $pengaduan = new Pengaduan($request->all());
    $pengaduan->user_id = Auth::id(); // Mengambil ID pengguna yang sedang masuk

    // Menyimpan foto jika ada
    if ($request->hasFile('photos')) {
        $filePaths = []; // Array untuk menyimpan path file
        foreach ($request->file('photos') as $file) {
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension(); // Membuat nama file unik
            $file->storeAs('photos', $filename, 'public'); // Menyimpan file di storage/app/public/photos
            $filePaths[] = 'photos/' . $filename; // Menyimpan path foto ke array
        }
        // Simpan path foto dalam format JSON atau di database sesuai kebutuhan
        $pengaduan->photo = json_encode($filePaths); // Simpan sebagai JSON
    }

    $pengaduan->save();

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

