<div>
    <button id="dropdownDefault" data-dropdown-toggle="dropdown"
        class="text-white bg-gradient-to-br from-pink-500 to-voilet-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 text-center inline-flex items-center shadow-md shadow-gray-300 hover:scale-[1.02] transition-transform"
        type="button">
        Filter
        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </button>

    <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700"
        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(359.5px, 677.5px, 0px);"
        data-popper-placement="bottom">
        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
            @foreach ($filter as $key => $item)
                <li>
                    <a href="#" data-dropdown-toggle="item-filter-{{ $key }}"
                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $key }}</a>
                    <div id="item-filter-{{ $key }}"
                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700"
                        style="position: absolute; inset: 0px auto auto 0px; margin-left: 0px; transform: translate3d(359.5px, 677.5px, 0px);"
                        data-popper-placement="bottom">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="item-filter-{{ $key }}">
                            @foreach ($item->data as $i)
                                <li>
                                    <a href="{{ route($i->route,[$i->value]) }}"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $i->label }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
            <li>
                <a href="?clear=true"
                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Clear</a>
            </li>
        </ul>
    </div>
</div>
