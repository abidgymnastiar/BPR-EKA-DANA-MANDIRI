<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJaminanPeminjaman;
use App\Http\Requests\StoreKategoriJumlahPeminjaman;
use App\Models\JenisJaminanModel;
use App\Models\ListJumlahPeminjamanModel;
use App\Models\PeminjamanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $filter = (object) array(
            'Ascending' => (object) [
                'data' => (object) [
                    'tanggal' => (object) [
                        'label' => 'Tanggal',
                        'value' => 'filter=created_at&order=asc',
                        'route' => 'admin.peminjam',
                    ]
                ],
            ],
            'Descending' => (object) [
                'data' => (object) [
                    'tanggal' => (object) [
                        'label' => 'Tanggal',
                        'value' => 'filter=created_at&order=desc',
                        'route' => 'admin.peminjam',
                    ]
                ],
            ],
            'Status' => (object) [
                'data' => (object) [
                    'pending' => (object) [
                        'label' => 'Pending',
                        'value' => 'filter=status&where=pending',
                        'route' => 'admin.peminjam',
                    ],
                    'done' => (object) [
                        'label' => 'Done',
                        'value' => 'filter=status&where=done',
                        'route' => 'admin.peminjam',
                    ],
                    'rejected' => (object) [
                        'label' => 'Rejected',
                        'value' => 'filter=status&where=rejected',
                        'route' => 'admin.peminjam',
                    ],
                    'process' => (object) [
                        'label' => 'Process',
                        'value' => 'filter=status&where=process',
                        'route' => 'admin.peminjam',
                    ],
                ],
            ],
        );

        $query = PeminjamanModel::query();
        $query = $this->filter($query, $request);
        $query = $this->search($query, $request);
        $peminjaman = $query->with('jenisJaminan','jumlahPeminjaman')->paginate(10);
        return view('admin.peminjaman.index', compact('peminjaman','filter'));
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

    public function update_status_peminjaman(Request $request)
    {
        DB::beginTransaction();
        try {
            $peminjaman = PeminjamanModel::findOrFail($request->id_peminjaman);
            if ($peminjaman) {
                $peminjaman->status = $request->status;
                $peminjaman->save();
                DB::commit();
                return redirect()->route('admin.peminjam')->with('success', 'Data berhasil diubah');
            } else {
                throw new \Exception('Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.peminjam')->withErrors('Terjadi kesalahan saat mengubah data');
        }
    }

    public function index_kategori()
    {
        $kategori = ListJumlahPeminjamanModel::all();
        return view('admin.peminjaman.kategori.index', compact('kategori'));
    }

    public function create_kategori()
    {
        return view('admin.peminjaman.kategori.create');
    }

    public function store_kategori_jumlah_peminjam(StoreKategoriJumlahPeminjaman $request)
    {
        DB::beginTransaction();
        try {
            $peminjaman = new ListJumlahPeminjamanModel();
            $peminjaman->jumlah_peminjaman = $request->jumlah_peminjaman;
            $peminjaman->author_id = auth()->user()->id;
            $peminjaman->save();
            DB::commit();
            return redirect()->route('admin.peminjam.kategori')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Terjadi kesalahan saat menyimpan data');
        }
    }

    public function edit_kategori($id)
    {
        $peminjaman = ListJumlahPeminjamanModel::find($id);
        if ($peminjaman) {
            return view('admin.peminjaman.kategori.edit', compact('peminjaman'));
        } else {
            return redirect()->route('admin.peminjam.kategori')->withErrors('Data tidak ditemukan');
        }
    }

    public function update_kategori(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $peminjaman = ListJumlahPeminjamanModel::find($id);
            if ($peminjaman) {
                $peminjaman->jumlah_peminjaman = $request->jumlah_peminjaman;
                $peminjaman->author_id = auth()->user()->id;
                $peminjaman->save();
                DB::commit();
                return redirect()->route('admin.peminjam.kategori')->with('success', 'Data berhasil diubah');
            } else {
                throw new \Exception('Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.peminjam.kategori')->withErrors('Terjadi kesalahan saat mengubah data');
        }
    }

    public function delete_kategori($id)
    {
        DB::beginTransaction();
        try {
            $peminjaman = ListJumlahPeminjamanModel::find($id);
            if ($peminjaman) {
                $peminjaman->delete();
                DB::commit();
                return redirect()->route('admin.peminjam.kategori')->with('success', 'Data berhasil dihapus');
            } else {
                throw new \Exception('Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.peminjam.kategori')->withErrors('Terjadi kesalahan saat menghapus data');
        }
    }

    public function index_jaminan()
    {
        $jaminan = JenisJaminanModel::orderBy('created_at', 'desc')->get();
        return view('admin.peminjaman.jaminan.index', compact('jaminan'));
    }

    public function create_jaminan()
    {
        return view('admin.peminjaman.jaminan.create');
    }

    public function store_jaminan(StoreJaminanPeminjaman $request)
    {
        DB::beginTransaction();
        try {
            $jaminan = new JenisJaminanModel();
            $jaminan->nama_jaminan = $request->nama_jaminan;
            $jaminan->author_id = auth()->user()->id;
            $jaminan->save();
            DB::commit();
            return redirect()->route('admin.peminjam.jaminan')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Terjadi kesalahan saat menyimpan data');
        }
    }

    public function edit_jaminan($id)
    {
        $jaminan = JenisJaminanModel::find($id);
        if ($jaminan) {
            return view('admin.peminjaman.jaminan.edit', compact('jaminan'));
        } else {
            return redirect()->route('admin.peminjam.jaminan')->withErrors('Data tidak ditemukan');
        }
    }

    public function update_jaminan(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $jaminan = JenisJaminanModel::find($id);
            if ($jaminan) {
                $jaminan->nama_jaminan = $request->nama_jaminan;
                $jaminan->author_id = auth()->user()->id;
                $jaminan->save();
                DB::commit();
                return redirect()->route('admin.peminjam.jaminan')->with('success', 'Data berhasil diubah');
            } else {
                throw new \Exception('Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.peminjam.jaminan')->withErrors('Terjadi kesalahan saat mengubah data');
        }
    }

    public function delete_jaminan($id)
    {
        DB::beginTransaction();
        try {
            $jaminan = JenisJaminanModel::find($id);
            if ($jaminan) {
                $jaminan->delete();
                DB::commit();
                return redirect()->route('admin.peminjam.jaminan')->with('success', 'Data berhasil dihapus');
            } else {
                throw new \Exception('Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.peminjam.jaminan')->withErrors('Terjadi kesalahan saat menghapus data');
        }
    }

    // private function to handle the filter query
    private function filter($query, Request $request)
    {
        if ($request->has('filter') && $request->has('where')) {
            $query->where($request->filter, $request->where);
        }
        if ($request->has('filter') && $request->has('order')) {
            $query->orderBy($request->filter, $request->order);
        }
        return $query;
    }

    private function search($query, Request $request)
    {
        if ($request->has('search')) {
            $query->where('nama_lengkap', 'like', '%' . $request->search . '%');
        }
        return $query;
    }
}
