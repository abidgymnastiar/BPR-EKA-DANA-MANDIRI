<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreKategoriProduk;
use App\Http\Requests\StoreProduk;
use App\Models\FotoProdukModel;
use App\Models\KategoriProdukModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        return true;
    }

    public function store(StoreProduk $request)
    {
        try {
            DB::beginTransaction();
            $produk = new ProdukModel();
            $produk->nama_produk = $request->nama_produk;
            $produk->deskripsi = $request->deskripsi;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;
            $produk->gambar = $request->gambar->hashName();
            $produk->kategori_id = $request->kategori_id;
            $produk->author = auth()->id();
            $produk->save();
            $request->file('gambar')->storeAs('public/produk', $request->file('gambar')->hashName());
            if ($request->hasFile('foto')) {
                foreach ($request->foto as $foto) {
                    $foto->storeAs('public/produk', $foto->hashName());
                    $produk->foto_produk()->create([
                        'foto' => $foto->hashName(),
                        'produk_id' => $produk->id,
                    ]);
                }
            }

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => 'Produk gagal disimpan'], 500);
        }

        return response()->json(['message' => 'Produk berhasil disimpan'], 201);
    }

    public function store_kategori(StoreKategoriProduk $request)
    {
        try {
            DB::beginTransaction();

            $kategori = new KategoriProdukModel();
            $kategori->nama_kategori = $request->nama_kategori;
            $kategori->deskripsi = $request->deskripsi;
            $kategori->save();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => 'Kategori gagal disimpan'], 500);
        }
        return response()->json(['message' => 'Kategori berhasil disimpan'], 201);
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $produk = ProdukModel::findOrFail($id);
            if ($produk->gambar) {
                $this->deleteGambarProduk($produk->gambar);
            }
            foreach ($produk->foto_produk as $foto) {
                if ($foto->foto) {
                    $this->deleteGambarProduk($foto->foto);
                }
            }
            $produk->foto_produk()->delete();
            $produk->delete();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => 'Produk gagal dihapus'], 500);
        }
        return response()->json(['message' => 'Produk berhasil dihapus'], 200);
    }

    public function show($id)
    {
        $produk = ProdukModel::with('kategori', 'foto_produk')->find($id);
        return response()->json($produk);
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $produk = ProdukModel::findOrFail($id);
            $produk->nama_produk = $request->nama_produk;
            $produk->deskripsi = $request->deskripsi;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;
            $produk->author = auth()->id();
            $produk->kategori_id = $request->kategori_id;
            if ($request->hasFile('gambar')) {
                if ($produk->gambar) {
                    $this->deleteGambarProduk($produk->gambar);
                }
                $produk->gambar = $request->gambar->hashName();
                $request->file('gambar')->storeAs('public/produk', $request->file('gambar')->hashName());
            }
            $produk->save();
            if ($request->hasFile('foto')) {
                foreach ($request->foto as $foto) {
                    $foto->storeAs('public/produk', $foto->hashName());
                    $produk->foto_produk()->create([
                        'foto' => $foto->hashName(),
                        'produk_id' => $produk->id,
                    ]);
                }
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => 'Produk gagal diupdate'], 500);
        }
        return response()->json(['message' => 'Produk berhasil diupdate'], 200);
    }

    private function deleteGambarProduk(string $file)
    {
        if (file_exists(storage_path('app/public/produk/' . $file))) {
            unlink(storage_path('app/public/produk/' . $file));
        }
    }

    public function addFoto(Request $request)
    {
        try {
            DB::beginTransaction();
            $produk = ProdukModel::findOrFail($request->produk_id);
            if ($request->hasFile('foto')) {
                foreach ($request->foto as $foto) {
                    $foto->storeAs('public/produk', $foto->hashName());
                    $produk->foto_produk()->create([
                        'foto' => $foto->hashName(),
                        'produk_id' => $produk->id,
                    ]);
                }
            }
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => 'Foto gagal disimpan'], 500);
        }
        return response()->json(['message' => 'Foto berhasil disimpan'], 201);
    }

    public function deleteFoto($id)
    {
        try {
            DB::beginTransaction();
            $foto = FotoProdukModel::findOrFail($id);
            if ($foto->foto) {
                $this->deleteGambarProduk($foto->foto);
            }
            $foto->delete();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => 'Foto gagal dihapus'], 500);
        }
        return response()->json(['message' => 'Foto berhasil dihapus'], 200);
    }

    public function deleteKategori($id)
    {
        try {
            DB::beginTransaction();
            $kategori = KategoriProdukModel::findOrFail($id);
            $kategori->delete();
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            return response()->json(['message' => 'Kategori gagal dihapus'], 500);
        }
        return response()->json(['message' => 'Kategori berhasil dihapus'], 200);
    }
}
