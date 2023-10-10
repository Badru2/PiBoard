<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card">
                <div class="card body">
                    <form action="{{ route('tweets.store') }}" method="post">
                        @csrf
                        <textarea name="content" id="" class="textarea textarea w-full bg-info" cols="30" rows="10"
                            placeholder="Tuliskan postingan"></textarea>
                        <input type="submit" value="Tweet" class="btn btn-primary">
                    </form>
                </div>
            </div>

            @foreach ($tweets as $tweet)
                <div class="card">
                    <div class="card-body">
                        <h2>{{ $tweet->user->name }}</h2>
                        <p>{{ $tweet->content }}</p>

                        @can('delete', $tweet)
                            <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        @endcan

                        <p>{{ $tweet->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
