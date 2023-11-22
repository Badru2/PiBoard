<aside id="right-sidebar" class="fixed top-0 right-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
    aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-5" style="background-color: #021F35">
        <ul class="space-y-2 font-medium">
            <li>
                <form class="mx-auto row w-full justify-content-around" action="{{ route('search') }}" method="GET">
                    <input type="text" class="w-full h-full bg-white rounded-xl border-gray-400 " name="search" placeholder="Search"
                        value="{{ old('search') }}">
                    {{-- <input type="submit" class="btn btn-primary col-2 h-12" value="SEARCH"> --}}
                </form>
            </li>
        </ul>
    </div>
</aside>
