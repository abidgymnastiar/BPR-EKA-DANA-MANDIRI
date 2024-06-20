<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePeminjaman;
use App\Models\PeminjamanModel;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function create(StorePeminjaman $request)
    {
        $validated = $request->validated();
        $peminjaman = new PeminjamanModel();
        try {
            DB::transaction(function () use ($peminjaman, $validated) {
                $peminjaman->nama_lengkap = $validated['nama_lengkap'];
                $peminjaman->no_hp = $validated['no_hp'];
                $peminjaman->email = $validated['email'];
                $peminjaman->provinsi = $validated['provinsi'];
                $peminjaman->kota = $validated['kota'];
                $peminjaman->pekerjaan = $validated['pekerjaan'];
                $peminjaman->id_jaminan = $validated['id_jaminan'];
                $peminjaman->sertifikat_atas_nama = $validated['sertifikat_atas_nama'];
                $peminjaman->jumlah_pinjaman = $validated['jumlah_pinjaman'];
                $peminjaman->save();
            });
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'data' => $peminjaman,
            'message' => 'Peminjaman berhasil disimpan',
        ], 200);
    }

    public function show($id)
    {
        $peminjaman = PeminjamanModel::with('jenisJaminan')->find($id);
        try {
            if ($peminjaman) {
                return response()->json([
                    'data' => $peminjaman,
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

    // delete method
    public function delete($id)
    {
        $peminjaman = PeminjamanModel::find($id);
        try {
            if ($peminjaman) {
                $peminjaman->delete();
            } else {
                throw new \Exception('Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
        return response()->json([
            'message' => 'Peminjaman berhasil dihapus',
        ], 200);
    }
}
