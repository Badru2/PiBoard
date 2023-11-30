<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Summary of __invoke
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function __invoke(Request $request)
    {
        $search = $request->get("search");

        $searchTweet = Tweet::with('user', 'likes', 'comments')->where('content', 'like', "%" . $search . "%")->orderBy('id', 'desc')->paginate();
        $searchUser = User::where('name', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate();

        return view('searchPage', ['tweets' => $searchTweet, 'users' => $searchUser], compact('search'));
    }
}
