<x-app-layout>
    <div class="py-6">
        <div class="container max-w-3xl mx-auto sm:px-6 lg:px-8 bg-dark p-4 ">
            <div>
                <form method="POST" action="{{ route('tweets.update', $tweet->id) }}">
                    @csrf
                    @method('PUT')
                    <textarea name="content" id="" rows="10" cols="30" class="textarea textarea-bordered text-white w-full"
                        placeholder="Tuliskan postingan...">{{ $tweet->content }}</textarea>
                    <button type="submit" value="edit" class="py-2 px-9 rounded-full text-white font-bold mt-3"
                        style="background-color: #4AB6FF">Publish</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
