@php
    $avatar_url = $user->avatar ? asset('images/avatar/' . Auth::user()->avatar) : 'https://ui-avatars.com/api/?name=' . $user->name;
@endphp

<img class="w-52 h-52 object-cover rounded-full" src="{{ $avatar_url }}" alt="Foto Profile {{ Auth::user()->name }}">
