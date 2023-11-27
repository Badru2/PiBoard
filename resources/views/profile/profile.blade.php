<x-app-layout>
    <div class="py-4">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8">
            {{-- User Profile --}}
            <div class="card rounded-none w-full mb-5 bg-dark p-3 text-white">
                <div class="card-title">
                    @if (Auth::user()->id == $user->id)
                        <div class="dropdown dropdown-left right-4 top-4 absolute">
                            <label tabindex="0" class="m-1 cursor-pointer"><iconify-icon
                                    icon="pepicons-pop:dots-y"></iconify-icon>
                            </label>
                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-black rounded-box w-40">
                                <li>
                                    <a href="{{ route('profile.edit') }}" class="text-warning">
                                        <i class="bi bi-pencil-square"></i> Edit Profil</a>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <a link href="route('logout')" class="bg-transparent text-danger"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            <i class="bi bi-box-arrow-left"></i><span class="ms-2">Logout</span>
                                            <a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="mx-auto my-3">
                    <div class="mx-auto">
                        <img class="w-52 h-52 object-cover rounded-full"
                            src="{{ $user->avatar ? asset('images/avatar/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                            alt="{{ url('https://ui-avatars.com/api/?name=' . $user->name) }}">
                    </div>
                    <div class="mt-3">
                        <h1>USERNAME: <b>{{ $user->name }}</b></h1>
                        <h2>FULLNAME: <b>{{ $user->fullName }}</b></h2>
                        <p>BIO: <b>{{ $user->bio }}</b></p>

                    </div>
                </div>
            </div>

            {{-- User Tweets --}}
            @foreach ($tweets as $tweet)
                <div class="card mb-5 border-dark">
                    <div class="card-body bg-dark text-light">
                        {{-- Content Tweet Start --}}
                        <div class="flex flex-row">
                            <div class="me-2">
                                <img class="w-12 h-12 object-cover rounded-full"
                                    src="{{ $tweet->user->avatar ? asset('images/avatar/' . $tweet->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($tweet->user->name) }}"
                                    alt="{{ url('https://ui-avatars.com/api/?name=' . $tweet->user->name) }}">
                            </div>
                            <div>
                                <strong>
                                    {{ $tweet->user->name }}
                                </strong>
                                <p>{{ $tweet->created_at->locale('id')->diffForHumans() }}</p>
                            </div>
                        </div>
                        <p class="captions my-2">{{ $tweet->content }}</p>

                        <div class="text-center mt-2">
                            @if (pathinfo($tweet->image, PATHINFO_EXTENSION) == 'mp4' || pathinfo($tweet->image, PATHINFO_EXTENSION) == 'webm')
                                <!-- video -->
                                <video id="myVideo" src="{{ asset('/storage/posts/' . $tweet->image) }}"
                                    disablepictureinpicture controlslist="nodownload" controls
                                    class="w-4/5 mx-auto rounded"></video>
                            @elseif (pathinfo($tweet->image, PATHINFO_EXTENSION) == 'mp3' ||
                                    pathinfo($tweet->image, PATHINFO_EXTENSION) == 'ogg' ||
                                    pathinfo($tweet->image, PATHINFO_EXTENSION) == 'wav')
                                <!-- audio -->
                                <audio controls>
                                    <source src="{{ asset('/storage/posts/' . $tweet->image) }}"
                                        type="audio/{{ pathinfo($tweet->image, PATHINFO_EXTENSION) }}">
                                </audio>
                            @else
                                <!-- gambar -->
                                <img src="{{ asset('/storage/posts/' . $tweet->image) }}" class="rounded mx-auto w-4/5"
                                    alt="">
                            @endif
                        </div>

                        {{-- Action Button --}}
                        @if (Auth::user()->id == $user->id)
                            <div class="position-absolute right-4">
                                <div class="dropdown dropdown-left">
                                    <label tabindex="0" class="m-1 cursor-pointer text-xl"><iconify-icon
                                            icon="pepicons-pop:dots-y"></iconify-icon></label>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 shadow bg-black rounded-box w-24">
                                        @can('delete', $tweet)
                                            <li>
                                                <a href="{{ route('tweets.destroy', $tweet->id) }}"
                                                    onclick="event.preventDefault(); document.getElementById('delete-form').submit();"
                                                    class="text-danger" data-confirm-delete="true">Hapus</a>

                                                <form id="delete-form" action="{{ route('tweets.destroy', $tweet->id) }}"
                                                    method="post" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </li>
                                        @endcan
                                        <li><a href="{{ route('tweets.edit', $tweet->id) }}"
                                                class="text-warning">Edit</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif


                        <div class="border-black border-t-2 border-b-2 mt-2 flex justify-evenly">
                            {{-- Like --}}
                            <a class="m-2 text-xl cursor-pointer text-white" onclick="like({{ $tweet->id }}, this)">
                                @if ($tweet->is_liked())
                                    <iconify-icon icon="material-symbols-light:favorite"></iconify-icon>
                                @else
                                    <iconify-icon icon="material-symbols:favorite-outline"></iconify-icon>
                                @endif
                                {{ $tweet->likes->count() }}
                            </a>

                            {{-- Comment --}}
                            <a href="{{ route('tweets.detail', $tweet->id) }}"
                                class="m-2 text-xl text-white"><iconify-icon icon="bx:comment"></iconify-icon>
                                {{ $tweet->comments->count() }}
                            </a>

                            {{-- Share Inactive --}}
                            <a href="{{ route('tweets.detail', $tweet->id) }}"
                                class="m-2 text-xl text-white"><iconify-icon icon="ri:share-line"></iconify-icon></a>

                            {{-- Favorite Inactive --}}
                            <a href="{{ route('tweets.detail', $tweet->id) }}"
                                class="m-2 text-xl text-white"><iconify-icon
                                    icon="material-symbols:bookmark-outline"></iconify-icon></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
