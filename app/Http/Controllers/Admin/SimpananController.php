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
        $filter = (object) array(
            'Ascending' => (object) [
                'data' => (object) [
                    'tanggal' => (object) [
                        'label' => 'Tanggal',
                        'value' => 'filter=created_at&order=asc',
                        'route' => 'admin.simpanan',
                    ]
                ],
            ],
            'Descending' => (object) [
                'data' => (object) [
                    'tanggal' => (object) [
                        'label' => 'Tanggal',
                        'value' => 'filter=created_at&order=desc',
                        'route' => 'admin.simpanan',
                    ]
                ],
            ],
            'Status' => (object) [
                'data' => (object) [
                    'pending' => (object) [
                        'label' => 'Pending',
                        'value' => 'filter=status&where=pending',
                        'route' => 'admin.simpanan',
                    ],
                    'done' => (object) [
                        'label' => 'Done',
                        'value' => 'filter=status&where=done',
                        'route' => 'admin.simpanan',
                    ],
                    'rejected' => (object) [
                        'label' => 'Rejected',
                        'value' => 'filter=status&where=rejected',
                        'route' => 'admin.simpanan',
                    ],
                    'process' => (object) [
                        'label' => 'Process',
                        'value' => 'filter=status&where=process',
                        'route' => 'admin.simpanan',
                    ],
                ],
            ],
        );

        $query = SimpananModel::query();
        $query = $this->filter($query, request());
        $query = $this->search($query, request());
        $simpanan = $query->paginate(10);
        return view('admin.simpanan.index',compact('filter', 'simpanan'));
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

    public function update_status_simpanan(Request $request)
    {
        DB::beginTransaction();
        try {
            $simpanan = SimpananModel::find($request->id_simpanan);
            if ($simpanan) {
                $simpanan->status = $request->status;
                $simpanan->save();
                DB::commit();
                return redirect()->route('admin.simpanan')->with('success', 'Status simpanan berhasil diubah');
            } else {
                throw new \Exception('Data tidak ditemukan');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.simpanan')->withErrors('Status simpanan gagal diubah');
        }
    }
}
