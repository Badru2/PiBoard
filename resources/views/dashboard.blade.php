<x-app-layout>
    <div class="py-4">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8">
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
                                <strong>{{ $tweet->user->name }}</strong>
                                <p>{{ $tweet->created_at->locale('id')->diffForHumans() }}</p>
                            </div>
                        </div>
                        <p class="captions">{{ $tweet->content }}</p>

                        <div class="text-center">
                            {{-- <img src="{{ asset('/storage/posts/' . $tweet->image) }}" class="rounded mx-auto w-4/5" alt="">
                            <video src="{{ asset('/storage/posts/' . $tweet->image) }}" controls class="w-full"></video> --}}
                            @if (pathinfo($tweet->image, PATHINFO_EXTENSION) == 'mp4' || pathinfo($tweet->image, PATHINFO_EXTENSION) == 'webm')
                                <!-- Jika itu video -->
                                <video id="myVideo" src="{{ asset('/storage/posts/' . $tweet->image) }}" disablepictureinpicture
                                    controlslist="nodownload" controls class="w-4/5 mx-auto rounded"></video>
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
                                <img src="{{ asset('/storage/posts/' . $tweet->image) }}" class="rounded mx-auto w-4/5" alt="">
                            @endif

                        </div>

                        <div class="position-absolute right-4">
                            <div class="dropdown dropdown-left">
                                <label tabindex="0" class="m-1 cursor-pointer text-xl"><iconify-icon
                                        icon="pepicons-pop:dots-y"></iconify-icon></label>
                                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-24">
                                    <li>
                                        @can('delete', $tweet)
                                            <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" data-confirm-delete="true" class="text-danger">Hapus</button>
                                            </form>
                                        @endcan
                                    </li>
                                    <li><a>Edit</a></li>
                                    <li><a>Report</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="border-black border-t-2 border-b-2 mt-2 flex justify-evenly">
                            <a class="m-2 text-xl cursor-pointer text-white" onclick="like({{ $tweet->id }}, this)">
                                {{-- {{ $tweet->is_liked() ? 'unlike' : 'like' }} --}}
                                @if ($tweet->is_liked())
                                    <iconify-icon icon="material-symbols-light:favorite"></iconify-icon>
                                @else
                                    <iconify-icon icon="material-symbols:favorite-outline"></iconify-icon>
                                @endif
                            </a>
                            {{-- <div id="tweet-likecount-{{ $tweet->id }}">
                                {{ $tweet->likes()->count() }}
                            </div> --}}

                            <a href="{{ route('tweets.detail', $tweet->id) }}" class="m-2 text-xl text-white"><iconify-icon
                                    icon="bx:comment"></iconify-icon>
                                {{ $tweet->comments->count() }}
                            </a>

                            <a href="{{ route('tweets.detail', $tweet->id) }}" class="m-2 text-xl text-white"><iconify-icon
                                    icon="ri:share-line"></iconify-icon></a>

                            <a href="{{ route('tweets.detail', $tweet->id) }}" class="m-2 text-xl text-white"><iconify-icon
                                    icon="material-symbols:bookmark-outline"></iconify-icon></a>

                        </div>



                        {{-- Content Tweet End --}}

                        {{-- Comments Start --}}
                        {{-- @include('tweets.comments', [
                            'comments' => $tweet->comments,
                            'tweet_id' => $tweet->id,
                        ]) --}}

                        {{-- <form method="post" action="{{ route('comments.store') }}" class="row">
                            @csrf
                            <div class="col-10">
                                <textarea class="form-control" name="content" rows="1"></textarea>
                                <input type="hidden" name="tweet_id" value="{{ $tweet->id }}" />
                            </div>
                            <div class=" col-2">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>  --}}
                        {{-- Comments End --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
