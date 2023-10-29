@foreach ($comments as $comment)
    <div class="display-comment" @if ($comment->parent_id != null) style="margin-left:40px;" @endif>
        <strong>{{ $comment->user->name }}</strong>
        <p>{{ $comment->content }}</p>
        <a href="" id="reply"></a>
        <form method="POST" action="{{ route('comments.store') }}" class="row">
            @csrf
            <div class="col-10">
                <textarea class="form-control" name="content" rows="1"></textarea>
                <input type="hidden" name="tweet_id" value="{{ $tweet->id }}" />
                <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            </div>
            <div class="col-2">
                <input type="submit" class="btn btn-warning" value="Reply" />
            </div>
        </form>
        @include('tweets.comments', ['comments' => $comment->replies])
    </div>
@endforeach
