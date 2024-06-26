<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePromosi;
use App\Models\PromosiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromosiController extends Controller
{
    public function index()
    {
        $promosi = PromosiModel::paginate(10);
        return view('admin.promosi.index',compact('promosi'));
    }

    public function create()
    {
        return view('admin.promosi.create');
    }

    public function store(StorePromosi $request)
    {
        try {
            DB::beginTransaction();
            $promosi = new PromosiModel();
            $promosi->nama = $request->nama;
            $promosi->deskripsi = $request->deskripsi;
            $promosi->gambar = $request->gambar->hashName();
            $promosi->author = auth()->id();
            $promosi->save();
            DB::commit();
            $request->gambar->storeAs('public/promosi', $request->gambar->hashName());
            return redirect()->route('admin.promosi')->with('success', 'Promosi berhasil ditambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Terjadi kesalahan');
        }
    }

    public function edit($id)
    {
        $promosi = PromosiModel::findOrFail($id);
        return view('admin.promosi.edit', compact('promosi'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $promosi = PromosiModel::findOrFail($id);
            $promosi->nama = $request->nama;
            $promosi->deskripsi = $request->deskripsi;
            if ($request->hasFile('gambar')) {
                $this->deleteGambar($promosi->gambar);
                $promosi->gambar = $request->gambar->hashName();
                $request->gambar->storeAs('public/promosi', $request->gambar->hashName());
            }
            $promosi->save();
            DB::commit();
            return redirect()->route('admin.promosi')->with('success', 'Promosi berhasil diubah');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Terjadi kesalahan');
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $promosi = PromosiModel::findOrFail($id);
            $this->deleteGambar($promosi->gambar);
            $promosi->delete();
            DB::commit();
            return redirect()->route('admin.promosi')->with('success', 'Promosi berhasil dihapus');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Terjadi kesalahan');
        }
    }

    private function deleteGambar(string $file)
    {
        if (file_exists(storage_path('app/public/promosi/' . $file))) {
            unlink(storage_path('app/public/promosi/' . $file));
        }
    }
}
