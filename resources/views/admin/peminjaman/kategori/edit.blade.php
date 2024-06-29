<x-layout.admin>
    <div id="main-content" class="h-full overflow-y-auto bg-gray-50 relative lg:ml-64 pt-16">
        <main>
            <div class="flex flex-col my-6 mx-4 rounded-2xl shadow-xl shadow-gray-200">
                <x-admin.alert />
                <div class="rounded-2xl">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow-lg">
                            <form class="p-10" method="POST" enctype="multipart/form-data"
                                action="{{ route('admin.peminjam.kategori.update', $peminjaman->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="mb-6">
                                    <label for="jumlah_peminjaman"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Jumlah
                                        Simpanan</label>
                                    <input type="text" id="jumlah_peminjaman" name="jumlah_peminjaman"
                                        value="{{ $peminjaman->jumlah_peminjaman }}"
                                        class="bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white"
                                        placeholder="e.g 5-100 Juta" required>
                                </div>
                                <button type="submit"
                                    class="text-white bg-gradient-to-br from-pink-500 to-voilet-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 text-center inline-flex items-center shadow-md shadow-gray-300 dark:shadow-gray-900 hover:scale-[1.02] transition-transform">
                                    Update
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <x-admin.kegiatan.kategori.add />

</x-layout.admin>
