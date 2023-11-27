@section('title')
    Search
@endsection
<x-app-layout>
    <div class="py-4">
        <div class="card w-1/2 grid grid-cols-5 mx-auto bg-dark my-3 mb-4">
            <a href="/" class="text-white text-4xl p-2 col-span-2"><iconify-icon icon="ep:back"></iconify-icon></a>
            <h1 class="text-white my-auto col-span-3">Hasil Pencarian: <span
                    class="text-cyan-300">"{{ $search }}"</span></h1>
        </div>
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8">

            {{-- Search Users --}}
            @foreach ($users as $user)
                <div class="card mb-5 border-dark">
                    <div class="card-body bg-dark text-white flex">
                        <a href="{{ route('profile.show', $user->name) }}" class="text-white">
                            <img class="w-32 h-32 object-cover rounded-full"
                                src="{{ $user->avatar ? asset('images/avatar/' . $user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) }}"
                                alt="{{ url('https://ui-avatars.com/api/?name=' . $user->name) }}">
                        </a>
                        <a href="{{ route('profile.show', $user->name) }}" class="text-white">
                            <strong>{{ $user->name }}</strong>
                        </a>
                    </div>
                </div>
            @endforeach

            {{-- Search Tweets --}}
            @foreach ($tweets as $tweet)
                <div class="card mb-5 border-dark">
                    <div class="card-body bg-dark text-light">

                        {{-- Profile user --}}
                        <div class="flex flex-row">
                            <div class="me-2">
                                <a href="{{ route('profile.show', $tweet->user->name) }}" class="text-white">
                                    <img class="w-12 h-12 object-cover rounded-full"
                                        src="{{ $tweet->user->avatar ? asset('images/avatar/' . $tweet->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($tweet->user->name) }}"
                                        alt="{{ url('https://ui-avatars.com/api/?name=' . $tweet->user->name) }}">
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('profile.show', $tweet->user->name) }}">
                                    <strong>{{ $tweet->user->name }}</strong>
                                </a>
                                <p>{{ $tweet->created_at->locale('id')->diffForHumans() }}</p>
                            </div>
                        </div>

                        {{-- Tweet Content --}}
                        <p class="captions">{{ $tweet->content }}</p>

                        <div class="text-center">
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

                        <div class="border-black border-t-2 border-b-2 mt-2 flex justify-evenly">
                            {{-- Like --}}
                            <a class="m-2 text-xl cursor-pointer " onclick="like({{ $tweet->id }}, this)">
                                @if ($tweet->is_liked())
                                    <iconify-icon icon="material-symbols-light:favorite"></iconify-icon>
                                @else
                                    <iconify-icon icon="material-symbols:favorite-outline"></iconify-icon>
                                @endif
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
