<x-app-layout>
    <div class="py-12 w-1/2 mx-auto sm:px-6 lg:px-8">
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
                <img src="{{ asset('/storage/posts/' . $tweet->image) }}" class="rounded w-4/5 mx-auto my-3" alt="">
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
