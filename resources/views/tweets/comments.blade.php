@foreach ($comments as $comment)
    <div class="display-comment my-3" @if ($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p class="my-1 mb-3">{{ $comment->content }}</p>
        <a href="" id="reply"></a>
        <form method="POST" action="{{ route('comments.store') }}" class="grid grid-cols-4">
            @csrf
            <div class="col-span-3">
                <textarea class="form-control" name="content" rows="1"></textarea>
                <input type="hidden" name="tweet_id" value="{{ $tweet->id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="col-span-1">
                <input type="submit" class="py-2 px-5 ms-2 bg-orange-400 rounded-lg" value="Reply" />
            </div>
        </form>
        @include('tweets.comments', ['comments' => $comment->replies])
    </div>
@endforeach
