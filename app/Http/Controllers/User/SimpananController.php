<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSimpanan;
use App\Models\SimpananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SimpananController extends Controller
{
    public function store(StoreSimpanan $request)
    {
        $request->validated();

        // Store the data
        DB::beginTransaction();

        try {
            $simpanan = new SimpananModel();
            $simpanan->nama_lengkap = $request->nama_lengkap;
            $simpanan->no_telepon = $request->no_telepon;
            $simpanan->email = $request->email;
            $simpanan->provinsi = $request->provinsi;
            $simpanan->kota = $request->kota;
            $simpanan->id_jumlah_simpanan = $request->id_jumlah_simpanan;
            $simpanan->save();

            DB::commit();

            return redirect()->route('admin.simpanan.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->route('admin.simpanan.index')->with('error', 'Data gagal disimpan');
        }
    }


    // delete
    public function delete($id)
    {
        $simpanan = SimpananModel::find($id);

        if ($simpanan) {
            $simpanan->delete();

            return redirect()->route('admin.simpanan.index')->with('success', 'Data berhasil dihapus');
        }

        return redirect()->route('admin.simpanan.index')->with('error', 'Data tidak ditemukan');
    }
}
