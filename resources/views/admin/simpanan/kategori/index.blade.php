<x-layout.admin>
    <div id="main-content" class="h-full overflow-y-auto bg-gray-50 relative lg:ml-64 pt-16">
        <main>
            <x-admin.alert />

            <div class="flex px-4 pt-2 justify-between">
                <a href="{{ route('admin.simpanan.kategori.create') }}"
                    class="text-white bg-gradient-to-br from-pink-500 to-voilet-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 text-center inline-flex items-center shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                    Tambah Kategori
                    <i class="fa fa-plus ml-1 font-bold" aria-hidden="true"></i>
                </a>
                <x-admin.search-form action="{{ route('admin.simpanan.kategori') }}"/>
            </div>

            <div class="flex flex-col my-6 mx-4 rounded-2xl shadow-xl shadow-gray-200">
                <div class=" rounded-2xl">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow-lg">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                <thead class="bg-white">
                                    <tr>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Jumlah Simpanan
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Created by
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Created At
                                        </th>
                                        <th scope="col" class="p-4 lg:p-5 ">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($kategori as $item)
                                        <tr class="hover:bg-gray-100">
                                            <td
                                                class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                                {{ $item->jumlah_simpanan }}</td>
                                            <td
                                                class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                                {{ $item->author->name }}</td>
                                            <td
                                                class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                                {{ $item->created_at }}</td>
                                            <td class="p-4 space-x-2 whitespace-nowrap lg:p-5">
                                                <a href="{{ route('admin.simpanan.kategori.edit', $item->id) }}"
                                                    class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-gray-700 bg-gray-200 rounded-lg hover:bg-gray-300 hover:text-gray-900 hover:scale-[1.02] transition-all">
                                                    <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                        </path>
                                                        <path fill-rule="evenodd"
                                                            d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Edit
                                                </a>
                                                <button type="button" data-modal-toggle="delete-kategori-modal" onclick="deleteForm({{ $item->id }})"
                                                    class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-gradient-to-br from-red-400 to-red-600 rounded-lg shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                                    <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd"
                                                            d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                            clip-rule="evenodd"></path>
                                                    </svg>
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <x-admin.no-data :hasData="$kategori->count() != 0" />
                        </div>
                    </div>
                </div>
            </div>


            <!-- Delete User Modal -->
            <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
                id="delete-kategori-modal">
                <div class="relative px-4 w-full max-w-md h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-2xl shadow-lg">
                        <!-- Modal header -->
                        <div class="flex justify-end p-2">
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="delete-kategori-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 pt-0 text-center">
                            <svg class="mx-auto w-20 h-20 text-red-500" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <h3 class="mt-5 mb-6 text-xl font-normal text-gray-500">Are you sure you want to delete
                                this?</h3>
                            <div class="flex justify-center">
                                <form action="" method="post" id="delete-kategori-form">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="text-white bg-gradient-to-br from-red-400 to-red-600 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                                        Yes, I'm sure
                                    </button>
                                </form>
                                <a href="#"
                                    class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center hover:scale-[1.02] transition-transform"
                                    data-modal-toggle="delete-kategori-modal">
                                    No, cancel
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        function deleteForm(id) {
            document.getElementById('delete-kategori-form').action = '/admin/simpanan/kategori/delete/' + id;
        }
    </script>
</x-layout.admin>
