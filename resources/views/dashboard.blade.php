@section('title')
    Dashboard
@endsection
<x-app-layout>
    <div class="py-4">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8">
            @foreach ($tweets as $tweet)
                <div class="card mb-5 border-dark">
                    <div class="card-body bg-dark text-light">
                        {{-- Content Tweet Start --}}
                        <div class="flex flex-row">
                            <div class="me-2">
                                <a href="{{ route('profile.show', $tweet->user->name) }}" class="text-white">
                                    <img class="w-12 h-12 object-cover rounded-full"
                                        src="{{ $tweet->user->avatar ? asset('images/avatar/' . $tweet->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($tweet->user->name) }}"
                                        alt="{{ url('https://ui-avatars.com/api/?name=' . $tweet->user->name) }}">
                                </a>
                            </div>
                            <div>
                                <strong>
                                    <a href="{{ route('profile.show', $tweet->user->name) }}" class="text-white">
                                        {{ $tweet->user->name }}
                                    </a>
                                </strong>
                                <p>{{ $tweet->created_at->locale('id')->diffForHumans() }}</p>
                            </div>
                        </div>
                        <p class="captions">{{ $tweet->content }}</p>

                        <div class="text-center">
                            @if (pathinfo($tweet->image, PATHINFO_EXTENSION) == 'mp4' || pathinfo($tweet->image, PATHINFO_EXTENSION) == 'webm')
                                <!-- video -->
                                <video id="myVideo" src="{{ asset('/storage/posts/' . $tweet->image) }}" disablepictureinpicture
                                    controlslist="nodownload" controls class="w-4/5 mx-auto rounded"></video>
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
                                <img src="{{ asset('/storage/posts/' . $tweet->image) }}" class="rounded mx-auto w-4/5" alt="">
                            @endif
                        </div>

                        <div class="border-black border-t-2 border-b-2 mt-2 flex justify-evenly">
                            {{-- Like --}}
                            <a class="m-2 text-xl cursor-pointer text-danger" onclick="like({{ $tweet->id }}, this)">
                                @if ($tweet->is_liked())
                                    <iconify-icon icon="material-symbols-light:favorite"></iconify-icon>
                                @else
                                    <iconify-icon icon="material-symbols:favorite-outline"></iconify-icon>
                                @endif
                                {{-- {{ $tweet->likes->count() }} --}}
                            </a>

                            {{-- Comment --}}
                            <a href="{{ route('tweets.detail', $tweet->id) }}" class="m-2 text-xl text-white"><iconify-icon
                                    icon="bx:comment"></iconify-icon>
                                {{ $tweet->comments->count() }}
                            </a>

                            {{-- Share inactive --}}
                            <a href="{{ route('tweets.detail', $tweet->id) }}" class="m-2 text-xl text-white"><iconify-icon
                                    icon="ri:share-line"></iconify-icon></a>

                            {{-- Favorite inactive --}}
                            <a href="{{ route('tweets.detail', $tweet->id) }}" class="m-2 text-xl text-white"><iconify-icon
                                    icon="material-symbols:bookmark-outline"></iconify-icon></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
