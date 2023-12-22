<div class="border-gray-200 w-full mobile-nav" style="background-color: #021F35">
    <div class="max-w-screen-xl flex flex-wrap items-center mx-auto p-1">
        {{-- <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('icon_white.svg') }}" class="h-9" alt="Flowbite Logo" />
        </a> --}}
        <div class="flex justify-evenly w-full items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="/" class="flex " id="user-menu-button" aria-expanded="false">
                <span class="sr-only">Open Search Menu</span>
                <p class="text-3xl p-2 text-white">
                    <iconify-icon icon="material-symbols:home"></iconify-icon>
                </p>
            </a>

            {{-- Search Dropdown Start --}}
            <button type="button" class="flex " id="user-menu-button" aria-expanded="false"
                data-dropdown-toggle="search-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open Search Menu</span>
                <p class="text-3xl p-2 text-white">
                    <iconify-icon icon="ion:search"></iconify-icon>
                </p>
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none  rounded-lg shadow bg-gray-700 divide-gray-600 w-4/5"
                id="search-dropdown">
                <div class="px-4 py-3">
                    <form class="mx-auto w-full" action="{{ route('search') }}" method="GET">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="default-search"
                                class="block w-full ps-10 text-sm text-gray-900 border
                                border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500
                                focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
                                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                                dark:focus:border-blue-500"
                                name="search" placeholder="Search" value="{{ old('search') }}">
                        </div>
                    </form>
                </div>
            </div>
            {{-- Search Dropdown End --}}

            <a href="{{ route('create') }}" class="flex " id="user-menu-button" aria-expanded="false">
                <p class="text-3xl p-2 text-white">
                    <iconify-icon icon="material-symbols:upload"></iconify-icon>
                </p>
            </a>

            <a href="{{ route('create') }}" class="flex " id="user-menu-button" aria-expanded="false">
                <p class="text-3xl p-2 text-white">
                    <iconify-icon icon="ic:outline-notifications"></iconify-icon>
                </p>
            </a>

            <a href="{{ route('profile.index') }}" class="flex " id="user-menu-button" aria-expanded="false">
                <p class="text-3xl p-2 text-white">
                    <img class="w-8 h-8 object-cover rounded-full"
                        src="{{ Auth::user()->avatar ? asset('images/avatar/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                        alt="{{ url('https://ui-avatars.com/api/?name=' . Auth::user()->name) }}">
                </p>
            </a>


        </div>


    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
