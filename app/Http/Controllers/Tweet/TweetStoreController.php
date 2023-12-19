<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Console\View\Components\Alert;
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
            'image'     => 'nullable|file|mimes:jpeg,jpg,png,mp4,mp3,gif,svg,webp',
            'content'   => 'nullable|min:1'
        ]);

        $image = $request->file('image');

        if ($image) {
            $image->storeAs('public/posts', $image->hashName());
            $imagePath = $image->hashName();
        } else {
            $imagePath = null;
        }

        Tweet::create([
            'user_id' => Auth::id(),
            'image'   => $imagePath,
            'content' => request('content')
        ]);

        // toast('Tweet created successfully', 'success');

        return redirect("/");
    }
}
