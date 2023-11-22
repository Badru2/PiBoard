<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-5" style="background-color: #021F35">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/">
                    <img class="w-2/3 mx-auto" src="{{ asset('icon_white.svg') }}" alt="">
                </a>
            </li>
            <li>
                <a href="/"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <div
                        class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                        <iconify-icon icon="uil:home"></iconify-icon>
                    </div>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/create"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <div
                        class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white">
                        <iconify-icon icon="material-symbols:upload"></iconify-icon>
                    </div>
                    <span class="ms-3">Create</span>
                </a>
            </li>
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
        </ul>
    </div>
</aside>
