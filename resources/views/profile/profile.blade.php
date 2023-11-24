<x-app-layout>
    <div class="py-4">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8">
            <div class="card mb-3 bg-dark p-3 text-white">
                <center><h2>Halo {{Auth::user()->name}} !</h2></center>
                <div class="mx-auto my-3">
                    
                    <div class="mx-auto">
                        <x-avatar :user="$user"></x-avatar>
                    </div>
                    <div class="mt-3">
                        <h1>USERNAME: <b>{{ Auth::user()->name }}</b></h1>
                        <h2>FULLNAME: <b>{{ Auth::user()->fullName }}</b></h2>
                        <p>BIO: <b>{{ Auth::user()->bio }}</b></p>
                        <div class="row">
                            <div class="col-sm-6">
                        <a href="{{ route('profile.edit')}}" class="text-white"> <i class="bi bi-pencil-square"></i> Edit Profil</a>
                            </div>
                            <div class="col">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a link href="route('logout')" class="bg-transparent"
                                    onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                   <p class="text-danger"> <i class="bi bi-box-arrow-left"></i> Logout </p>
                                <a>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($tweets as $tweet)
                <div class="card mb-5 border-dark">
                    <div class="card-body bg-dark text-light">
                        {{-- Content Tweet Start --}}
                        <div class="flex flex-row">
                            <div class="me-2">
                                <x-avatar-small :user="$user"></x-avatar-small>
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

                        {{-- Delete Tweet Start --}}
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
                                    <li><a class="text-dark">Edit</a></li>
                                    <li><a class="text-dark">Report</a></li>
                                </ul>
                            </div>
                        </div>

                        {{-- Delete Tweet End --}}

                        <div class="border-black border-t-2 border-b-2 mt-2 flex justify-evenly">
                            <a class="m-2 text-xl cursor-pointer text-white" onclick="like({{ $tweet->id }}, this)">
                                {{-- {{ $tweet->is_liked() ? 'unlike' : 'like' }} --}}
                                @if ($tweet->is_liked())
                                    <iconify-icon icon="material-symbols-light:favorite"></iconify-icon>
                                @else
                                    <iconify-icon icon="material-symbols:favorite-outline"></iconify-icon>
                                @endif
                                {{ $tweet->likes->count() }}
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
