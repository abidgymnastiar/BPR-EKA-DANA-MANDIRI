<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKegiatan;
use App\Models\KategoriKegiatanModel;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KegiatanController extends Controller
{
    public function index()
    {
        return true;
    }
    public function store(StoreKegiatan $request)
    {
        try {
            DB::beginTransaction();
            $kegiatan = new KegiatanModel();
            $kegiatan->nama_kegiatan = $request->nama_kegiatan;
            $kegiatan->isi = $request->isi;
            $kegiatan->tgl_mulai = $request->tgl_mulai;
            $kegiatan->tgl_selesai = $request->tgl_selesai;
            $kegiatan->gambar = $request->gambar->hashName();
            $kegiatan->author = auth()->id();
            $kegiatan->save();
            foreach ($request->kategori as $kategori) {
                $kegiatan->kategori()->create([
                    'kegiatan_id' => $kegiatan->id,
                    'kegiatan_kategori_id' => $kategori,
                ]);
            }
            DB::commit();

            // save image
            $request->gambar->storeAs('public/kegiatan', $request->gambar->hashName());
            return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil ditambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('admin.kegiatan')->with('error', 'Kegiatan gagal ditambahkan');
        }
    }

    public function store_kategori(Request $request)
    {
        $request->validate([
            'nama_kategori' => ['required', 'string'],
        ]);
        try {
            DB::beginTransaction();
            $kategori = new KategoriKegiatanModel();
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->keterangan = $request->keterangan;
            $kategori->color_label = $request->color_label;
            $kategori->icon = $request->icon;
            $kategori->save();
            DB::commit();
            return redirect()->route('admin.kegiatan')->with('success', 'Kategori kegiatan berhasil ditambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('admin.kegiatan')->with('error', 'Kategori kegiatan gagal ditambahkan');
        }
    }

    public function show($id)
    {
        $kegiatan = KegiatanModel::findOrFail($id);
        return true;
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $kegiatan = KegiatanModel::findOrFail($id);
            // delete image
            $this->deleteGambarKegiatan($kegiatan->gambar);
            $kegiatan->delete();
            DB::commit();
            return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil dihapus');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('admin.kegiatan')->with('error', "Kegiatan gagal dihapus");
        }
    }

    private function deleteGambarKegiatan(string $file)
    {
        if (file_exists(storage_path('app/public/kegiatan/' . $file))) {
            unlink(storage_path('app/public/kegiatan/' . $file));
        }
    }
}
