<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($tweets as $tweet)
                <div class="card mt-5">
                    <div class="card-body bg-dark text-light">
                        {{-- Content Tweet Start --}}
                        <strong>{{ $tweet->user->name }}</strong>
                        <p>{{ $tweet->content }}</p>

                        <td class="text-center">
                            <img src="{{ asset('/storage/posts/' . $tweet->image) }}" id="myImg" class="rounded"
                                style="width: 150px">
                        </td>

                        <div id="myModal" class="modal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                        </div>

                        {{-- Delete Tweet Start --}}
                        @can('delete', $tweet)
                            <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        @endcan
                        {{-- Delete Tweet End --}}

                        <p>{{ $tweet->created_at->diffForHumans() }}</p>
                        {{-- Content Tweet End --}}

                        {{-- Comments Start --}}
                        {{-- <h4>Display Comments</h4> --}}
                        @include('tweets.comments', [
                            'comments' => $tweet->comments,
                            'tweet_id' => $tweet->id,
                        ])

                        <form method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="content" rows="1"></textarea>
                                <input type="hidden" name="tweet_id" value="{{ $tweet->id }}" />
                            </div>
                            <div class="form-group">
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
