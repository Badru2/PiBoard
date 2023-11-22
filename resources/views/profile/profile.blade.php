<x-app-layout>
    <div class="py-4">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8">
            @foreach ($tweets as $tweet)
                <div class="card mb-5 border-dark">
                    <div class="card-body bg-dark text-light">
                        {{-- Content Tweet Start --}}
                        <div class="flex flex-row">
                            <div class="text-5xl me-2">
                                <iconify-icon icon="ion:person-circle-outline"></iconify-icon>
                            </div>
                            <div>
                                <strong>{{ $tweet->user->name }}</strong>
                                <p>{{ $tweet->created_at->locale('id')->diffForHumans() }}</p>
                            </div>
                        </div>
                        <p class="captions">{{ $tweet->content }}</p>

                        <td class="text-center">
                            <img src="{{ asset('/storage/posts/' . $tweet->image) }}" class="rounded mx-auto w-4/5" alt="">
                        </td>

                        {{-- Delete Tweet Start --}}
                        <div class="position-absolute right-4">
                            @can('delete', $tweet)
                                {{-- <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                </form> --}}
                                <a href="{{ route('tweets.destroy', $tweet->id) }}" type="submit" class="btn btn-danger"
                                    data-confirm-delete="true">Hapus</a>
                            @endcan
                        </div>

                        {{-- Delete Tweet End --}}

                        <div class="border-black border-t-2 border-b-2 mt-2 flex justify-evenly">
                            <a class="m-2 text-xl cursor-pointer" onclick="like({{ $tweet->id }}, this)">
                                {{-- {{ $tweet->is_liked() ? 'unlike' : 'like' }} --}}
                                @if ($tweet->is_liked())
                                    <iconify-icon icon="material-symbols-light:favorite"></iconify-icon>
                                @else
                                    <iconify-icon icon="material-symbols:favorite-outline"></iconify-icon>
                                @endif
                            </a>

                            <a href="{{ route('tweets.detail', $tweet->id) }}" class="m-2 text-xl"><iconify-icon
                                    icon="bx:comment"></iconify-icon></a>

                            <a href="{{ route('tweets.detail', $tweet->id) }}" class="m-2 text-xl"><iconify-icon
                                    icon="ri:share-line"></iconify-icon></a>

                            <a href="{{ route('tweets.detail', $tweet->id) }}" class="m-2 text-xl"><iconify-icon
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
