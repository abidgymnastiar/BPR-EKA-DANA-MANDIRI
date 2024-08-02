<x-layout.admin>
    <div id="main-content" class="h-full overflow-y-auto bg-gray-50 relative lg:ml-64 pt-16">
        <main>
            <div class="flex px-4 pt-2 justify-between">
                <x-admin.filter-form :filter="$filter" />
                <x-admin.search-form action="{{ route('admin.promosi') }}"/>
            </div>
            <x-admin.alert />
            <div class="flex flex-col my-6 mx-4 rounded-2xl shadow-xl shadow-gray-200">
                <div class=" rounded-2xl">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow-lg">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed">
                                <thead class="bg-white">
                                    <tr>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Nama
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            No Hp
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Email
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase lg:p-5">
                                            Status
                                        </th>
                                        <th scope="col" class="p-4 lg:p-5 ">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($simpanan as $item)
                                        <tr class="hover:bg-gray-100">
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                                {{$item->nama_lengkap}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                                {{$item->no_hp}}</td>
                                            <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap lg:p-5">
                                                {{$item->email}}</td>
                                            <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap lg:p-5">
                                                <div class="flex items-center">
                                                    {{$item->status}}
                                                </div>
                                            </td>
                                            <td class="p-4 space-x-2 whitespace-nowrap lg:p-5">
                                                <button type="button" data-modal-toggle="show-detail-modal"
                                                        onclick="showDetail({{ $item }})"
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
                                                    Detail
                                                </button>
                                                <button type="button" data-modal-toggle="edit-status-modal"
                                                        onclick="formSetStatus({{ $item->id }},'{{ $item->status }}')"
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
                                                    Set Status
                                                </button>
                                                <button type="button" data-modal-toggle="delete-user-modal"
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
                        </div>
                    </div>
                </div>
            </div>
            <div>
                {{ $simpanan->links() }}
            </div>

        </main>
    </div>

    <!-- Edit Modal -->
    <form action="{{ route('admin.simpanan.update-status') }}" id="form-edit-peminjam" method="POST">
        @csrf
        @method('PUT')
        <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
             id="edit-status-modal">
            <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-2xl shadow-lg">
                    <!-- Modal header -->
                    <div class="flex justify-between items-start p-5 rounded-t border-b">
                        <h3 class="text-xl font-semibold">
                            Edit user
                        </h3>
                        <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center"
                                data-modal-toggle="edit-status-modal">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <input type="hidden" name="id_simpanan">
                        <label for="status"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Status</label>
                        <select id="status" name="status"
                                class="bg-transparent border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5 dark:text-white">
                            <option value="pending">Pending</option>
                            <option value="process">Process</option>
                            <option value="rejected">Rejected</option>
                            <option value="done">Done</option>
                        </select>
                    </div>
                    <!-- Modal footer -->
                    <div class="items-center p-6 rounded-b border-t border-gray-200">
                        <button
                            class="text-white rounded-lg bg-gradient-to-br from-pink-500 to-voilet-500 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform text-sm px-5 py-2.5 text-center"
                            type="submit">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Delete User Modal -->
    <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
         id="delete-user-modal">
        <div class="relative px-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-2xl shadow-lg">
                <!-- Modal header -->
                <div class="flex justify-end p-2">
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-toggle="delete-user-modal">
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
                        this
                        user?</h3>
                    <a href="#"
                       class="text-white bg-gradient-to-br from-red-400 to-red-600 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform">
                        Yes, I'm sure
                    </a>
                    <a href="#"
                       class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center hover:scale-[1.02] transition-transform"
                       data-modal-toggle="delete-user-modal">
                        No, cancel
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Show Detail Modal -->
    <div class="hidden overflow-y-auto overflow-x-hidden fixed right-0 left-0 top-4 z-50 justify-center items-center md:inset-0 h-modal sm:h-full"
         id="show-detail-modal">
        <div class="relative px-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-2xl shadow-lg">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-5 rounded-t border-b">
                    <h3 class="text-xl font-semibold">
                        Detail
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-2xl text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-toggle="show-detail-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                             xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                  d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                  clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <form action="#" id="form-detail-peminjam">
                        <div class="grid grid-cols-6 gap-6">
                            <div class="col-span-6 sm:col-span-3">
                                <label for="nama_lengkap"
                                       class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap</label>
                                <input type="text" id="nama_lengkap" readonly
                                       class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                       placeholder="Bonnie" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900">No
                                    Hp</label>
                                <input type="text" id="no_hp" readonly
                                       class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                       placeholder="Green" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="email"
                                       class="block mb-2 text-sm font-medium text-gray-900">Email</label>
                                <input type="email" name="email" id="email" readonly
                                       class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                       placeholder="example@company.com" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="provinsi"
                                       class="block mb-2 text-sm font-medium text-gray-900">Provinsi</label>
                                <input type="text" id="provinsi" readonly
                                       class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                       placeholder="e.g. +(12)3456 789" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="kota"
                                       class="block mb-2 text-sm font-medium text-gray-900">Kota</label>
                                <input type="text" id="kota" readonly
                                       class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                       placeholder="Development" required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="status"
                                       class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                                <input type="text" id="status" readonly
                                       class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                       required>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="created_at"
                                       class="block mb-2 text-sm font-medium text-gray-900">Created At</label>
                                <input type="text" id="created_at" readonly
                                       class="shadow-lg-sm border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full p-2.5"
                                       required>
                            </div>
                        </div>

                    <!-- Modal footer -->
                        <div class="items-center p-6 rounded-b border-t border-gray-200">
                            <button data-modal-toggle="show-detail-modal"
                                    class="text-white rounded-lg bg-gradient-to-br from-pink-500 to-voilet-500 shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform text-sm px-5 py-2.5 text-center"
                                    type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout.admin>

<script>
    function formSetStatus(id, status) {
        const form = document.getElementById('form-edit-peminjam')
        form.id_simpanan.value = id
        form.status.value = status
    }

    function showDetail(e) {
        console.log(e.nama_lengkap);
        const form = document.getElementById('form-detail-peminjam')
        form.nama_lengkap.value = e.nama_lengkap
        form.no_hp.value = e.no_hp
        form.email.value = e.email
        form.provinsi.value = e.provinsi
        form.kota.value = e.kota
        form.status.value = e.status
        form.created_at.value = Date(e.created_at)
    }
</script>
