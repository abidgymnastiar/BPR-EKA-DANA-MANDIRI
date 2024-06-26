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
                        <a href="{{ route('admin.nasabah') }}"
                            class="{{ isActiveRoute('admin.nasabah', true) ? '!hover:bg-white shadow-lg shadow-gray-200 bg-white' : '' }} flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200  group transition-all duration-200"
                            sidebar-toggle-collapse>
                            <div
                                class="{{ isActiveRoute('admin.nasabah', true) ? 'bg-fuchsia-500 !text-white' : '' }} bg-white shadow-lg shadow-gray-300  text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </div>
                            <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Nasabah</span>
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
                </ul>
                <hr class="border-0 h-px bg-gradient-to-r from-gray-100 via-gray-300 to-gray-100">
                <div class="pt-2">

                    <a href="https://creative-tim.com/learning-lab/flowbite/overview/soft-ui-dashboard/"
                        target="_blank"
                        class="flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200 group transition-all duration-200"
                        sidebar-toggle-collapse>
                        <div
                            class="bg-white shadow-lg shadow-gray-300 text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                            <svg class="text-dark mb-1" width="12px" height="12px" viewBox="0 0 40 44"
                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>document</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1870.000000, -591.000000)" fill="currentColor"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(154.000000, 300.000000)">
                                                <path class="color-background"
                                                    d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z"
                                                    opacity="0.603585379"></path>
                                                <path class="color-background"
                                                    d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Docs</span>
                    </a>
                    <a href="https://creative-tim.com/learning-lab/flowbite/alerts/soft-ui-dashboard/" target="_blank"
                        class="flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200 group transition-all duration-200"
                        sidebar-toggle-collapse>
                        <div
                            class="bg-white shadow-lg shadow-gray-300 text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                            <svg class="text-dark mb-1" width="12px" height="12px" viewBox="0 0 40 44"
                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>switches</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-1870.000000, -440.000000)" fill="currentColor"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(154.000000, 149.000000)">
                                                <path class="color-background"
                                                    d="M10,20 L30,20 C35.4545455,20 40,15.4545455 40,10 C40,4.54545455 35.4545455,0 30,0 L10,0 C4.54545455,0 0,4.54545455 0,10 C0,15.4545455 4.54545455,20 10,20 Z M10,3.63636364 C13.4545455,3.63636364 16.3636364,6.54545455 16.3636364,10 C16.3636364,13.4545455 13.4545455,16.3636364 10,16.3636364 C6.54545455,16.3636364 3.63636364,13.4545455 3.63636364,10 C3.63636364,6.54545455 6.54545455,3.63636364 10,3.63636364 Z"
                                                    opacity="0.6"></path>
                                                <path class="color-background"
                                                    d="M30,23.6363636 L10,23.6363636 C4.54545455,23.6363636 0,28.1818182 0,33.6363636 C0,39.0909091 4.54545455,43.6363636 10,43.6363636 L30,43.6363636 C35.4545455,43.6363636 40,39.0909091 40,33.6363636 C40,28.1818182 35.4545455,23.6363636 30,23.6363636 Z M30,40 C26.5454545,40 23.6363636,37.0909091 23.6363636,33.6363636 C23.6363636,30.1818182 26.5454545,27.2727273 30,27.2727273 C33.4545455,27.2727273 36.3636364,30.1818182 36.3636364,33.6363636 C36.3636364,37.0909091 33.4545455,40 30,40 Z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Components</span>
                    </a>
                    <a href="https://creative-tim.com/contact-us" target="_blank"
                        class="flex items-center py-2.5 px-4 text-base font-normal text-dark-500 rounded-lg hover:bg-gray-200 group transition-all duration-200"
                        sidebar-toggle-collapse>
                        <div
                            class="bg-white shadow-lg shadow-gray-300 text-dark-700 p-2.5 mr-1 rounded-lg text-center grid place-items-center">
                            <svg class="text-dark mb-1" width="12px" height="12px" viewBox="0 0 44 43"
                                version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <title>megaphone</title>
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g transform="translate(-2168.000000, -591.000000)" fill="currentColor"
                                        fill-rule="nonzero">
                                        <g transform="translate(1716.000000, 291.000000)">
                                            <g transform="translate(452.000000, 300.000000)">
                                                <path class="color-background"
                                                    d="M35.7958333,0.273166667 C35.2558424,-0.0603712374 34.5817509,-0.0908856664 34.0138333,0.1925 L19.734,7.33333333 L9.16666667,7.33333333 C4.10405646,7.33333333 0,11.4373898 0,16.5 C0,21.5626102 4.10405646,25.6666667 9.16666667,25.6666667 L19.734,25.6666667 L34.0138333,32.8166667 C34.5837412,33.1014624 35.2606401,33.0699651 35.8016385,32.7334768 C36.3426368,32.3969885 36.6701539,31.8037627 36.6666942,31.1666667 L36.6666942,1.83333333 C36.6666942,1.19744715 36.3370375,0.607006911 35.7958333,0.273166667 Z">
                                                </path>
                                                <path class="color-background"
                                                    d="M38.5,11 L38.5,22 C41.5375661,22 44,19.5375661 44,16.5 C44,13.4624339 41.5375661,11 38.5,11 Z"
                                                    opacity="0.601050967"></path>
                                                <path class="color-background"
                                                    d="M18.5936667,29.3333333 L10.6571667,29.3333333 L14.9361667,39.864 C15.7423448,41.6604248 17.8234451,42.4993948 19.6501416,41.764381 C21.4768381,41.0293672 22.3968823,38.982817 21.7341667,37.1286667 L18.5936667,29.3333333 Z"
                                                    opacity="0.601050967"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                        <span class="ml-3 text-dark-500 text-sm font-light" sidebar-toggle-item>Help</span>
                    </a>
                </div>
            </div>
        </div>
</aside>
