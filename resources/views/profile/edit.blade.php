@section('title')
    Edit - {{ $user->name }}
@endsection
<x-app-layout>
    <div class="py-12">
        <div class="w-1/2 mx-auto sm:px-6 lg:px-8 space-y-6 py-3 bg-dark">
            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <x-input label="Username" name="name" :object="$user" />

                <x-input label="Full Name" name="fullName" :object="$user" />

                <x-input label="Biodata" name="bio" :object="$user" />

                <div class="">
                    <label for="avatar" class="label " style="color: white;">Avatar: </label>
                    <input type="file" class="col-span-3 custom-file-input" name="avatar">
                </div>

                @if ($errors->has('avatar'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('avatar') }}
                    </span>
                @endif

                <button type="submit"
                    class="bg-cyan-600 py-2 px-5 rounded-sm font-bold text-white my-3">Submit</button>
            </form>
        </div>
    </div>
</x-app-layout>
