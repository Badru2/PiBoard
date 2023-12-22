@section('title')
    {{ $user->name }}
@endsection
<x-app-layout>
    <div class="py-4">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8 mobile-container  ">
            {{-- User Profile --}}
            <div class="card rounded-none w-full mb-5 bg-dark p-3 text-white">
                <div class="card-title ">
                    <h1 class="text-3xl">Profile</h1>

                    {{-- User Menu --}}
                    @if (Auth::user()->id == $user->id)
                        <div class="dropdown dropdown-left right-4 top-4 absolute">
                            <label tabindex="0" class="m-1 cursor-pointer"><iconify-icon
                                    icon="pepicons-pop:dots-y"></iconify-icon>
                            </label>
                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-black rounded-box w-40">
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="text-warning text-x2l">
                                        <i class="bi bi-pencil-square"></i> Edit Profil</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a href="route('logout')" class="bg-transparent text-danger"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            <i class="bi bi-box-arrow-left"></i><span class="ms-2">Logout</span>
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>

                <hr class="h-px my-1 bg-gray-200 border-0 dark:bg-gray-700">
                <div class="my-3 flex flex-row">
                    <div class="container w-2/4 avatar-container">
                        <img class="w-52 h-52 object-cover rounded-full avatar-mobile"
                            src="{{ $user->avatar ? asset('images/avatar/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                            alt="{{ url('https://ui-avatars.com/api/?name=' . $user->name) }}"
                            onclick="avatar_image.showModal()">
                    </div>
                    <div class="mt-3 container w-3/4">
                        <h1 class="font-bold text-3xl">{{ $user->name }}</h1>
                        <h2 class="mt-3 mb-2 font-semibold text-2xl">{{ $user->fullName }}</h2>
                        <p class="max-w-fit">{{ $user->bio }}</p>
                        @if (Auth::user()->id != $user->id)
                            <button class="" onclick="follow({{ $user->id }}, this)">
                                {{ Auth::user()->following->contains($user->id) ? 'unfollow' : 'follow' }}
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            {{-- User Tweets --}}
            @include('components.tweets')

            @include('components.image-modal')

            @include('components.comment-modal')

            {{-- Avatar Image Modal --}}
            <dialog id="avatar_image" class="modal">
                <img class="w-80 h-80 object-cover"
                    src="{{ $user->avatar ? asset('images/avatar/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                    alt="{{ url('https://ui-avatars.com/api/?name=' . $user->name) }}">

                <form method="dialog" class="modal-backdrop bg-transparent">
                    <button>close</button>
                </form>
            </dialog>
        </div>
    </div>
</x-app-layout>
