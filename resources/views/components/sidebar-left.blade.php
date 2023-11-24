<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-5" style="background-color: #021F35">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="/">
                    <img class="w-3/4" src="{{ asset('icon_white.svg') }}" alt="">
                </a>
            </li>
            <li class="my-5">
                <a href="/profile" class="flex items-center text-white rounded-lg   dark:hover:bg-gray-700 group">
                    <div class="text-4xl">
                        <img class="w-10 h-10 object-cover rounded-full"
                            src="{{ Auth::user()->avatar ? asset('images/avatar/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) }}"
                            alt="{{ url('https://ui-avatars.com/api/?name=' . Auth::user()->name) }}">
                    </div>
                    <div class="ms-3">
                        {{ Auth::user()->name }}
                    </div>
                </a>
                <div class="w-2/3 h-1 rounded-md mt-3 bg-teal-700"></div>
            </li>
            <li class="my-1">
                <a href="/" class="flex items-center text-white rounded-lg   dark:hover:bg-gray-700 group">
                    <div class="text-4xl">
                        <iconify-icon icon="uil:home"></iconify-icon>
                    </div>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="/create" class="flex items-center text-white rounded-lg   dark:hover:bg-gray-700 group">
                    <div class="text-4xl">
                        <iconify-icon icon="material-symbols:upload"></iconify-icon>
                    </div>
                    <span class="ms-3">Create</span>
                </a>
            </li>
            
        </ul>
    </div>
</aside>
