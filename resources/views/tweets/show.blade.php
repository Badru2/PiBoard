@section('title')
    Show - {{ $tweet->content }}
@endsection
<x-app-layout>
    <div class="py-4 w-1/2 mx-auto sm:px-6 lg:px-8">
        <div class="card w-1/2 grid grid-cols-5 mx-auto bg-dark my-3 mb-4">
            <a href="/" class="text-white text-4xl p-2 col-span-2"><iconify-icon icon="ep:back"></iconify-icon></a>
            <h1 class="text-white my-auto col-span-3">Kembali</h1>
        </div>
        <div class="card-body bg-dark text-light">
            {{-- Content Tweet Start --}}
            <div class="flex flex-row">
                <div class="text-5xl me-2">
                    <img class="w-12 h-12 object-cover rounded-full"
                        src="{{ $tweet->user->avatar ? asset('images/avatar/' . $tweet->user->avatar) : 'https://ui-avatars.com/api/?name=' . urlencode($tweet->user->name) }}"
                        alt="{{ url('https://ui-avatars.com/api/?name=' . $tweet->user->name) }}">
                </div>
                <div>
                    <strong>{{ $tweet->user->name }}</strong>
                    <p>{{ $tweet->created_at->locale('id')->diffForHumans() }}</p>
                </div>
            </div>

            <p class="captions">{{ $tweet->content }}</p>

            <div class="text-center my-3">
                {{-- <img src="{{ asset('/storage/posts/' . $tweet->image) }}" class="rounded mx-auto w-4/5" alt="">
                <video src="{{ asset('/storage/posts/' . $tweet->image) }}" controls class="w-full"></video> --}}
                @if (pathinfo($tweet->image, PATHINFO_EXTENSION) == 'mp4' || pathinfo($tweet->image, PATHINFO_EXTENSION) == 'webm')
                    <!-- Jika itu video -->
                    <video src="{{ asset('/storage/posts/' . $tweet->image) }}" controls
                        class="w-4/5 mx-auto rounded"></video>
                @elseif (pathinfo($tweet->image, PATHINFO_EXTENSION) == 'mp3' ||
                        pathinfo($tweet->image, PATHINFO_EXTENSION) == 'ogg' ||
                        pathinfo($tweet->image, PATHINFO_EXTENSION) == 'wav')
                    <!-- Jika itu audio -->
                    <audio controls>
                        <source src="{{ asset('/storage/posts/' . $tweet->image) }}"
                            type="audio/{{ pathinfo($tweet->image, PATHINFO_EXTENSION) }}">
                    </audio>
                @else
                    <!-- Jika itu gambar -->
                    <img src="{{ asset('/storage/posts/' . $tweet->image) }}" class="rounded mx-auto w-4/5"
                        alt="">
                @endif

            </div>

            {{-- Delete Tweet Start --}}
            <div class="position-absolute right-4">
                @can('delete', $tweet)
                    <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                @endcan
            </div>
            {{-- Delete Tweet End --}}
            {{-- Content Tweet End --}}

            {{-- Comments Start --}}
            <form method="post" action="{{ route('comments.store') }}" class="grid grid-cols-4">
                @csrf
                <div class="col-span-3">
                    <textarea class="form-control" name="content" rows="1"></textarea>
                    <input type="hidden" name="tweet_id" value="{{ $tweet->id }}" />
                </div>
                <div class="col-span-1">
                    <input type="submit" class="py-2 px-4 ms-2 rounded-lg bg-emerald-700" value="Add Comment" />
                </div>
            </form>

            @include('tweets.comments', [
                'comments' => $tweet->comments,
                'tweet_id' => $tweet->id,
            ])

            {{-- Comments End --}}
        </div>
    </div>
</x-app-layout>
