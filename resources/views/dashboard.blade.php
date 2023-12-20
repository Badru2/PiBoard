@section('title')
    Dashboard
@endsection
<x-app-layout>
    <div class="py-4">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8">
            @include('components.tweets')

            @include('components.image-modal')

            @include('components.comment-modal')

            @foreach ($tweets as $tweet)
                <!-- Modal -->
                <dialog id="report_{{ $tweet->id }}" class="modal">
                    <div class="modal-box w-6/12 max-w-6xl">
                        <div class="modal-action">
                            <form method="dialog">
                                <button
                                    class="btn btn-sm btn-circle btn-ghost absolute right-4 top-2 text-white">✕</button>
                            </form>
                        </div>
                        <p class="text-white">{{ $tweet->content }}</p>
                        <div class="mt-3">
                            <button class="btn">Pelecehan</button>
                            <button class="btn">Porno grafi</button>
                            <button class="btn">Pencemaran</button>
                        </div>
                    </div>
                    <form method="dialog" class="modal-backdrop bg-transparent border-0">
                        <button></button>
                    </form>
                </dialog>
            @endforeach
        </div>
    </div>
</x-app-layout>
