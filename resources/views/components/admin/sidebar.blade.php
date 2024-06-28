<div class="hidden fixed inset-0 z-10 bg-gray-900 opacity-50" id="sidebarBackdrop"></div>
<aside id="sidebar"
    class="hidden fixed top-0 left-0 z-20 flex-col flex-shrink-0 pt-16 w-64 h-full duration-200 lg:flex transition-width"
    aria-label="Sidebar">
    <div class="flex relative flex-col flex-1 pt-0 min-h-0 bg-gray-50">
        <div class="flex overflow-y-auto flex-col flex-1 pt-8 pb-4">
            <div class="flex-1 px-3 bg-gray-50" id="sidebar-items">
                <ul class="pb-2 pt-1">
                    <li>
                        <form action="#" method="GET" class="lg:hidden">
                            <label for="mobile-search" class="sr-only">Search</label>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input type="text" name="email" id="mobile-search"
                                    class="bg-gray-50 border border-gray-300 text-dark-500 text-sm font-light rounded-lg focus:ring-2 focus:ring-fuchsia-50 focus:border-fuchsia-300 block w-full pl-10 p-2.5 mb-2"
                                    placeholder="Search">
                            </div>
                        </form>
                    </li>
                    <li>
                        <a href="{{ route('admin.dashboard') }}"
                            class="flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200 group transition-all duration-200 {{ isActiveRoute('admin.dashboard', true) ? '!hover:bg-white shadow-lg shadow-gray-200 bg-white' : '' }}"
                            sidebar-toggle-collapse>
                            <div
                                class="bg-white shadow-lg shadow-gray-300  {{ isActiveRoute('admin.dashboard', true) ? 'bg-fuchsia-500 !text-white' : '' }}   text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                                <i class="fa fa-shopping-bag " aria-hidden="true"></i>
                            </div>
                            <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.peminjam') }}"
                            class="{{ isActiveRoute('admin.peminjam', true) ? '!hover:bg-white shadow-lg shadow-gray-200 bg-white' : '' }} flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200  group transition-all duration-200"
                            sidebar-toggle-collapse>
                            <div
                                class="{{ isActiveRoute('admin.peminjam', true) ? 'bg-fuchsia-500 !text-white' : '' }} bg-white shadow-lg shadow-gray-300  text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Peminjaman</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.simpanan') }}"
                            class="{{ isActiveRoute('admin.simpanan', true) ? '!hover:bg-white shadow-lg shadow-gray-200 bg-white' : '' }} flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200  group transition-all duration-200"
                            sidebar-toggle-collapse>
                            <div
                                class="{{ isActiveRoute('admin.simpanan', true) ? 'bg-fuchsia-500 !text-white' : '' }} bg-white shadow-lg shadow-gray-300  text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Simpanan</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.kegiatan') }}"
                            class="{{ isActiveRoute('admin.kegiatan', true) ? '!hover:bg-white shadow-lg shadow-gray-200 bg-white' : '' }} flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200  group transition-all duration-200"
                            sidebar-toggle-collapse>
                            <div
                                class="{{ isActiveRoute('admin.kegiatan', true) ? 'bg-fuchsia-500 !text-white' : '' }} bg-white shadow-lg shadow-gray-300  text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                            <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Kegiatan</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.promosi') }}"
                            class="{{ isActiveRoute('admin.promosi', true) ? '!hover:bg-white shadow-lg shadow-gray-200 bg-white' : '' }} flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200  group transition-all duration-200"
                            sidebar-toggle-collapse>
                            <div
                                class="{{ isActiveRoute('admin.promosi', true) ? 'bg-fuchsia-500 !text-white' : '' }} bg-white shadow-lg shadow-gray-300  text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                                <i class="fa-solid fa-newspaper"></i>
                            </div>
                            <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Promosi</span>
                        </a>
                    </li>
                </ul>
                <hr class="border-0 h-px bg-gradient-to-r from-gray-100 via-gray-300 to-gray-100">
                <div class="pt-2">
                    <a href="{{ route('admin.peminjam.jaminan') }}"
                        class="{{ isActiveRoute('admin.peminjam.jaminan', true) ? '!hover:bg-white shadow-lg shadow-gray-200 bg-white' : '' }} flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200  group transition-all duration-200"
                        sidebar-toggle-collapse>
                        <div
                            class="{{ isActiveRoute('admin.peminjam.jaminan', true) ? 'bg-fuchsia-500 !text-white' : '' }} bg-white shadow-lg shadow-gray-300  text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                        <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Kategori Jaminan</span>
                    </a>
                    <a href="{{ route('admin.peminjam.kategori') }}"
                        class="{{ isActiveRoute('admin.peminjam.kategori', true) ? '!hover:bg-white shadow-lg shadow-gray-200 bg-white' : '' }} flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200  group transition-all duration-200"
                        sidebar-toggle-collapse>
                        <div
                            class="{{ isActiveRoute('admin.peminjam.kategori', true) ? 'bg-fuchsia-500 !text-white' : '' }} bg-white shadow-lg shadow-gray-300  text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                        <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Kategori Peminjaman</span>
                    </a>
                    <a href="{{ route('admin.simpanan.kategori') }}"
                        class="{{ isActiveRoute('admin.simpanan.kategori', true) ? '!hover:bg-white shadow-lg shadow-gray-200 bg-white' : '' }} flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200  group transition-all duration-200"
                        sidebar-toggle-collapse>
                        <div
                            class="{{ isActiveRoute('admin.simpanan.kategori', true) ? 'bg-fuchsia-500 !text-white' : '' }} bg-white shadow-lg shadow-gray-300  text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                        <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Kategori Simpanan</span>
                    </a>
                </div>
            </div>
        </div>
</aside>
