@foreach ($tweets as $tweet)
    <div class="card mb-5 border-dark tweet-mobile">
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
            <p class="captions att">{{ $tweet->content }}</p>

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
                    <img src="{{ asset('/storage/posts/' . $tweet->image) }}"
                        class="rounded mx-auto w-4/5 max-h-96 object-cover"
                        onclick="my_modal_{{ $tweet->id }}.showModal()" alt="">
                @endif
            </div>

            {{-- Menu (Delete, Edit, Report) --}}
            @include('components.menu-dot')

            {{-- Action Menu (Like, Share, Comment, Bookmark) --}}
            @include('components.action-menu')

        </div>
    </div>
@endforeach
