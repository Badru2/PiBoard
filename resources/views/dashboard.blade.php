<x-app-layout>
    <div class="py-12">
        <div class="card max-w-2xl mx-auto sm:px-6 lg:px-8 bg-dark d-flex">
            <form class="mx-auto row w-full justify-content-around" action="{{ route('search') }}" method="GET">
                <input type="text" class="form-control col-9 h-12 bg-dark border-gray-400 text-white " name="search"
                    placeholder="Search" value="{{ old('search') }}">
                <input type="submit" class="btn btn-primary col-2 h-12" value="SEARCH">
            </form>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($tweets as $tweet)
                <div class="card mt-5 border-dark">
                    <div class="card-body bg-dark text-light">
                        {{-- Content Tweet Start --}}
                        <strong>{{ $tweet->user->name }}</strong>
                        <p>{{ $tweet->content }}</p>

                        <td class="text-center">
                            <img src="{{ asset('/storage/posts/' . $tweet->image) }}" class="rounded"
                                style="width: 150px">
                        </td>

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

                        <p>{{ $tweet->created_at->locale('id')->diffForHumans() }}</p>
                        {{-- Content Tweet End --}}

                        {{-- Comments Start --}}
                        @include('tweets.comments', [
                            'comments' => $tweet->comments,
                            'tweet_id' => $tweet->id,
                        ])

                        <form method="post" action="{{ route('comments.store') }}" class="row">
                            @csrf
                            <div class="col-10">
                                <textarea class="form-control" name="content" rows="1"></textarea>
                                <input type="hidden" name="tweet_id" value="{{ $tweet->id }}" />
                            </div>
                            <div class=" col-2">
                                <input type="submit" class="btn btn-success" value="Add Comment" />
                            </div>
                        </form>
                        {{-- Comments End --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-app-layout>
