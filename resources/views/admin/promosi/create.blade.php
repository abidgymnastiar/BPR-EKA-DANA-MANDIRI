<x-layout.admin>
    <div id="main-content" class="h-full overflow-y-auto bg-gray-50 relative lg:ml-64 pt-16">
        <main>
            <div class="flex flex-col my-6 mx-4 rounded-2xl shadow-xl shadow-gray-200">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>
                                    <div class="p-4 mb-4 text-sm text-white bg-gradient-to-br from-pink-500 to-voilet-500 rounded-lg"
                                        role="alert">
                                        <span class="font-medium">{{ $error }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @session('success')
                    <div class="p-4 mb-4 text-sm text-white bg-gradient-to-br bg-blue-700 rounded-lg" role="alert">
                        <span class="font-medium">{{ session('success') }}</span>
                    </div>
                @endsession

                <div class="rounded-2xl">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow-lg">
                            <form class="p-10" method="POST" enctype="multipart/form-data"
                                action="{{ route('admin.promosi.store') }}">
                                @csrf
                                <div class="mb-6">
                                    <label for="nama"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama</label>
                                    <input type="text" id="nama" name="nama"
                                        class="bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white"
                                        placeholder="Nama" required>
                                </div>
                                
                                <div class="mb-6">
                                    <label for="deskripsi"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Deskripsi</label>
                                    <input type="text" id="deskripsi" name="deskripsi"
                                        class="bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white"
                                        placeholder="Deskripsi" required>
                                </div>

                                <div class="mb-6">
                                    <label for="gambar"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Gambar
                                        Kegiatan</label>
                                    <input type="file" id="gambar" name="gambar"
                                        class="bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full dark:text-white"
                                        placeholder="Nama Kegiatan" required>
                                    <img id="imagePreview" class="hidden h-32 mt-2" src="#" alt="your image" />
                                </div>


                                <button type="submit"
                                    class="text-white bg-gradient-to-br from-pink-500 to-voilet-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 text-center inline-flex items-center shadow-md shadow-gray-300 dark:shadow-gray-900 hover:scale-[1.02] transition-transform">
                                    Simpan
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <x-admin.kegiatan.kategori.add />
    <script>
        document.getElementById('gambar').addEventListener('change', function(event) {
            // remove hidden class
            document.getElementById('imagePreview').classList.remove('hidden');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('imagePreview').src = e.target.result;
                }

                reader.readAsDataURL(file);
            } else {
                document.getElementById('imagePreview').src = "#";
            }
        });
    </script>

</x-layout.admin>
