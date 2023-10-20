<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TweetStoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $request->validate([
            'image'     => 'nullable|image|mimes:jpeg,jpg,png',
            'content'   => 'required|min:1'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        Tweet::create([
            'user_id' => Auth::id(),
            'image'   => $image->hashName(),
            'content' => request('content')
        ]);

        return redirect("/");
    }
}
