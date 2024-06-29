<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKategoriJumlahSimpanan;
use App\Http\Requests\StoreSimpanan;
use App\Models\ListJumlahSimpananModel;
use App\Models\SimpananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimpananController extends Controller
{
    public function index()
    {
        return view('admin.simpanan.index');
    }

    // show
    public function show($id)
    {
        $simpanan = SimpananModel::with('jumlahSimpanan')->find($id);
        try {
            if ($simpanan) {
                return response()->json([
                    'data' => $simpanan,
                ], 200);
            } else {
                throw new \Exception('Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 404);
        }
    }

    // index kategori
    public function index_kategori()
    {
        $kategori = ListJumlahSimpananModel::all();
        return view('admin.simpanan.kategori.index', compact('kategori'));
    }

    public function create_kategori()
    {
        return view('admin.simpanan.kategori.create');
    }

    // store kategori jumlah simpanan
    public function store_kategori_jumlah_simpanan(StoreKategoriJumlahSimpanan $request)
    {
        DB::beginTransaction();
        try {
            $simpanan = new ListJumlahSimpananModel();
            $simpanan->jumlah_simpanan = $request->jumlah_simpanan;
            $simpanan->author_id = auth()->user()->id;
            $simpanan->save();
            DB::commit();
            return redirect()->route('admin.simpanan.kategori')->with('success', 'Kategori jumlah simpanan berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.simpanan.kategori')->withErrors('Kategori jumlah simpanan gagal disimpan');
        }
    }

    public function edit_kategori($id)
    {
        $kategori = ListJumlahSimpananModel::find($id);
        return view('admin.simpanan.kategori.edit', compact('kategori'));
    }

    public function update_kategori(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $simpanan = ListJumlahSimpananModel::find($id);
            $simpanan->jumlah_simpanan = $request->jumlah_simpanan;
            $simpanan->author_id = auth()->user()->id;
            $simpanan->save();
            DB::commit();
            return redirect()->route('admin.simpanan.kategori')->with('success', 'Kategori jumlah simpanan berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.simpanan.kategori')->withErrors('Kategori jumlah simpanan gagal diubah');
        }
    }

    public function delete_kategori($id)
    {
        DB::beginTransaction();
        try {
            $simpanan = ListJumlahSimpananModel::findOrFail($id);
            $simpanan->delete();
            DB::commit();
            return redirect()->route('admin.simpanan.kategori')->with('success', 'Kategori jumlah simpanan berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.simpanan.kategori')->withErrors('Kategori jumlah simpanan gagal dihapus');
        }
    }
}
