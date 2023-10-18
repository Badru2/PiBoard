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
        $this->validate($request, [
            'image'     => 'nullable|image|mimes:jpeg,jpg,png|max:5048',
            'content'   => 'required|min:10'
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
