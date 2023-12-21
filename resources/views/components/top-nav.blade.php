<nav class="border-gray-200 mobile-nav" style="background-color: #021F35">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('icon_white.svg') }}" class="h-9" alt="Flowbite Logo" />
        </a>
        <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
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

            {{-- User Dropdown Start --}}
            <button type="button"
                class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-10 h-10 object-cover rounded-full"
                    src="{{ Auth::user()->avatar ? asset('images/avatar/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                    alt="{{ url('https://ui-avatars.com/api/?name=' . Auth::user()->name) }}">
            </button>
            <!-- Dropdown menu -->
            <div class="z-50 hidden my-4 text-base list-none divide-y rounded-lg shadow bg-gray-700 divide-gray-600"
                id="user-dropdown">
                <div class="px-4 py-3">
                    <a href="{{ route('profile.index') }}">
                        <span
                            class="block text-sm text-gray-200 font-bold dark:text-white">{{ Auth::user()->name }}</span>
                        <span
                            class="block text-sm  text-gray-300 truncate dark:text-gray-400">{{ Auth::user()->email }}</span>
                    </a>
                </div>
            </div>
            {{-- User Dropdown End --}}

            <button data-collapse-toggle="navbar-user" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden focus:outline-none focus:ring-2 dark:text-gray-400 hover:bg-gray-700 focus:ring-gray-600"
                aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4  rounded-lg bmd:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0  dark:bg-gray-800 ">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="block py-2 px-3 rounded hover:bg-gray-500 md:p-0 text-white md:dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Dashboard</a>
                </li>
                <li>
                    <a href="{{ route('create') }}"
                        class="block py-2 px-3 rounded hover:bg-gray-500 md:p-0 text-white md:dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Create</a>
                </li>
                <li>
                    <a href="{{ route('profile.index') }}"
                        class="block py-2 px-3 rounded hover:bg-gray-500 md:p-0 text-white md:dark:hover:text-blue-500 md:dark:hover:bg-transparent dark:border-gray-700">Profile</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
