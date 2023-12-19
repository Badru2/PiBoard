@foreach ($tweets as $tweet)
    <dialog id="comment_{{ $tweet->id }}" class="modal text-white">
        <div class="modal-box w-6/12 max-w-5xl h-screen">
            <p class="text-white captions">{{ $tweet->content }}</p>
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
                    <img src="{{ asset('/storage/posts/' . $tweet->image) }}" class="rounded mx-auto w-4/5"
                        onclick="my_modal_{{ $tweet->id }}.showModal()" alt="">
                @endif
            </div>
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
            <div class="modal-action">
            </div>
        </div>
        <form method="dialog" class="modal-backdrop bg-transparent">
            <button>close</button>
        </form>
    </dialog>
@endforeach
