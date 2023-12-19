@foreach ($tweets as $tweet)
    <!-- Modal -->
    <dialog id="my_modal_{{ $tweet->id }}" class="modal">
        {{-- <div class="modal-box w-11/12 max-w-6xl">
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn btn-sm btn-circle btn-ghost absolute right-4 top-2 text-white">✕</button>
                </form>
            </div>
        </div> --}}
        <div class="modal-box max-w-5xl">
            <img src="{{ asset('/storage/posts/' . $tweet->image) }}" class="w-full"
                onclick="my_modal_{{ $tweet->id }}.showModal()" alt="">
        </div>
        <form method="dialog" class="modal-backdrop bg-transparent border-0">
            <button></button>
        </form>
    </dialog>
@endforeach
