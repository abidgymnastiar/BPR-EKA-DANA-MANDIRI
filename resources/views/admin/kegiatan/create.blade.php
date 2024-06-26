<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
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
                                action="{{ route('admin.kegiatan.store') }}">
                                @csrf
                                <div class="mb-6">
                                    <label for="nama_kegiatan"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama
                                        Kegiatan</label>
                                    <input type="text" id="nama_kegiatan" name="nama_kegiatan"
                                        class="bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white"
                                        placeholder="Nama Kegiatan" required>
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

                                <div class="flex items-center justify-between">
                                    <label for="gambar"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Kategori
                                        Kegiatan</label>
                                    <button
                                        class="text-white bg-gradient-to-br from-pink-500 to-voilet-500 font-medium rounded-lg text-sm px-3 py-2.5 mr-2 text-center inline-flex items-center shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform"
                                        type="button" data-modal-toggle="add-kategori-modal">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <fieldset class="mb-6 grid grid-cols-3">
                                    {{-- Checkbox --}}
                                    @foreach ($kategori as $item)
                                        <div class="flex mb-4">
                                            <div class="flex items-center h-5">
                                                <input name="kategori[]" id="keterangan-{{ $item->id }}"
                                                    aria-describedby="keterangan-{{ $item->id }}"
                                                    value="{{ $item->id }}" type="checkbox"
                                                    class="w-5 h-5 bg-transparent rounded border border-gray-300 focus:ring-0 checked:bg-dark-900">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="keterangan-{{ $item->id }}"
                                                    class="font-medium text-gray-900 dark:text-gray-300">{{ $item->nama_kategori }}</label>
                                                <div class="text-gray-500 dark:text-gray-300">
                                                    <span class="text-xs font-normal">{{ $item->keterangan }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if ($kategori->isEmpty())
                                        <p class="text-red-500">Data tidak ditemukan, buat telebih dahulu</p>
                                    @endif
                                </fieldset>

                                <div class="flex items-center">
                                    <div class="mb-6">
                                        <label for="tgl_mulai"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Mulai</label>
                                        <input type="datetime-local" value="{{ now() }}" id="tgl_mulai"
                                            name="tgl_mulai"
                                            class="bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white"
                                            placeholder="Nama Kegiatan" required>
                                    </div>
                                    -
                                    <div class="mb-6">
                                        <label for="tgl_selesai"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Selesai</label>
                                        <input type="datetime-local" value="{{ now() }}" id="tgl_selesai"
                                            name="tgl_selesai"
                                            class="bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white"
                                            placeholder="Nama Kegiatan" required>
                                    </div>
                                </div>

                                <label for="summernote"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Isi</label>
                                <textarea name="isi" id="summernote">{!! old('isi') ?? '#Isi Disini' !!}</textarea>

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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $('#summernote').summernote({
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });

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
