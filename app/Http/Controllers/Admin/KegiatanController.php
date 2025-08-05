<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKegiatan;
use App\Models\KategoriKegiatanModel;
use App\Models\KegiatanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class KegiatanController
 *
 * @category Controller
 * @package  App\Http\Controllers\Admin
 * @author   Edoaurahman <edoaurahman@gmail.com>
 * @property KegiatanModel $kegiatan
 * @property KategoriKegiatanModel $kategori
 * @property Request $request
 * @property StoreKegiatan $storeKegiatan
 * @license  MIT License
 * @link     https://example.com
 */
class KegiatanController extends Controller
{
    /**
     * Display the index page for the KegiatanController.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $kegiatan = KegiatanModel::orderBy('updated_at', 'desc')->paginate(10);
        // dd($kegiatan);
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function store(StoreKegiatan $request)
    {
        try {
            $validate = $request->validate([
                "nama_kegiatan" => "required",
                "isi" => "required",
                "tgl_mulai" => "required",
                "tgl_selesai" => "required",
            ]);
            if ($request->file('gambar')) {
                $image = $request->file('gambar');
                $imageName = time() . 'gambar.' . $image->getClientOriginalExtension();
                $image->move(public_path('kegiatan'), $imageName);
                $validate['gambar'] = $imageName;
            }
            $validate['author'] = auth()->id();

            $kegiatan = KegiatanModel::create($validate);
            foreach ($request->kategori as $kategori) {
                $kegiatan->kategori()->create([
                    'kegiatan_id' => $kegiatan->id,
                    'kegiatan_kategori_id' => $kategori,
                ]);
            }
            return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil ditambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('admin.kegiatan')->with('error', 'Kegiatan gagal ditambahkan');
        }
    }

    public function create()
    {
        $kategori = KategoriKegiatanModel::all();
        return view('admin.kegiatan.create', compact('kategori'));
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
            $kategori->save();
            DB::commit();
            return redirect()->back()->with('success', 'Kategori kegiatan berhasil ditambahkan');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->back()->withErrors('Kategori kegiatan gagal ditambahkan');
        }
    }

    public function show($id)
    {
        $kegiatan = KegiatanModel::findOrFail($id);
        return true;
    }

    public function edit($id)
    {
        $kegiatan = KegiatanModel::findOrFail($id);
        $kategori = KategoriKegiatanModel::all();
        return view('admin.kegiatan.edit', compact('kegiatan', 'kategori'));
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

    // update kegiatan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kegiatan' => ['required', 'string'],
            'isi' => ['required', 'string'],
            'tgl_mulai' => ['required'],
            'tgl_selesai' => ['required'],
            'kategori' => ['required', 'array'],
            'kategori.*' => ['required', 'integer', 'exists:tb_kategori_kegiatan,id'],
        ]);
        try {
            DB::beginTransaction();
            $kegiatan = KegiatanModel::findOrFail($id);
            $kegiatan->nama_kegiatan = $request->nama_kegiatan;
            $kegiatan->isi = $request->isi;
            $kegiatan->tgl_mulai = $request->tgl_mulai;
            $kegiatan->tgl_selesai = $request->tgl_selesai;
            if ($request->file('gambar')) {
                $this->deleteGambarKegiatan($kegiatan->gambar);
                $image = $request->file('gambar');
                $imageName = time() . 'gambar.' . $image->getClientOriginalExtension();
                $image->move(public_path('kegiatan'), $imageName);
                // $validate['gambar'] = $imageName;
                // $kegiatan->gambar = $request->gambar->hashName();
                // $request->gambar->storeAs('public/kegiatan', $request->gambar->hashName());

                $kegiatan->gambar = $imageName;
            }

            $kegiatan->save();
            $kegiatan->kategori()->delete();
            foreach ($request->kategori as $kategori) {
                $kegiatan->kategori()->create([
                    'kegiatan_id' => $kegiatan->id,
                    'kegiatan_kategori_id' => $kategori,
                ]);
            }
            DB::commit();
            return redirect()->route('admin.kegiatan')->with('success', 'Kegiatan berhasil diubah');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('admin.kegiatan')->with('error', 'Kegiatan gagal diubah');
        }
    }

    // update kategori
    public function update_kategori(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => ['required', 'string'],
        ]);
        try {
            DB::beginTransaction();
            $kategori = KategoriKegiatanModel::findOrFail($id);
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->keterangan = $request->keterangan;
            $kategori->color_label = $request->color_label;
            $kategori->icon = $request->icon;
            $kategori->save();
            DB::commit();
            return redirect()->route('admin.kegiatan')->with('success', 'Kategori kegiatan berhasil diubah');
        } catch (\Throwable $e) {
            DB::rollBack();
            return redirect()->route('admin.kegiatan')->with('error', 'Kategori kegiatan gagal diubah');
        }
    }

    private function deleteGambarKegiatan(string $file)
    {
        // if (file_exists(storage_path('app/public/kegiatan/' . $file))) {
        //     unlink(storage_path('app/public/kegiatan/' . $file));
        // }
        $filePath = public_path('kegiatan/' . $file);

        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}
