<x-layout.user>

    <section>
        <div class="mx-auto bg-white p-8 rounded-lg shadow-lg py-10">
            <div class="max-w-3xl " method="post" id="printJS-form">
                <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Formulir Pendaftaran Nasabah Bank Edaman</h2>

                <form action="#" method="POST">
                    <!-- Nama Lengkap -->
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 font-semibold mb-2">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nama Lengkap">
                    </div>

                    <!-- Nomor KTP -->
                    <div class="mb-4">
                        <label for="ktp" class="block text-gray-700 font-semibold mb-2">Nomor KTP</label>
                        <input type="text" id="ktp" name="ktp" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Nomor KTP">
                    </div>

                    <!-- Alamat -->
                    <div class="">
                        <label for="alamat" class="block text-gray-700 font-semibold mb-2">Alamat</label>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="rt" class="block text-gray-700 font-semibold mb-2">RW/RT</label>
                                <input type="text" id="rt" name="rt" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan RW dan RT">
                            </div>
                        </div>

                        <div class="mt-4">
                            <label for="desa" class="block text-gray-700 font-semibold mb-2">Desa/Kelurahan</label>
                            <input type="text" id="desa" name="desa" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Desa/Kelurahan">
                        </div>

                        <div class="mt-4">
                            <label for="kecamatan" class="block text-gray-700 font-semibold mb-2">Kecamatan</label>
                            <input type="text" id="kecamatan" name="kecamatan" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Kecamatan">
                        </div>

                        <div class="mt-4">
                            <label for="kabupaten" class="block text-gray-700 font-semibold mb-2">Kabupaten</label>
                            <input type="text" id="kabupaten" name="kabupaten" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Kabupaten">
                        </div>

                        <div class="mt-4">
                            <label for="kode_pos" class="block text-gray-700 font-semibold mb-2">Kode Pos</label>
                            <input type="text" id="kode_pos" name="kode_pos" required class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Kode Pos">
                        </div>
                    </div>
            </div>
            <div class="w-full flex mt-4">
                <button class="text-white bg-blue-700 p-2 rounded hover:bg-blue-600" type="button" onclick="printJS('printJS-form', 'html')">Print Form</button>
            </div>
        </div>
    </section>

</x-layout.user>
