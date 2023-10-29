<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function __invoke(Request $request)
    {
        $search = $request->get("search");

        $searchTweet = Tweet::where('content', 'like', "%" . $search . "%")->orderBy('id', 'desc')->paginate();

        return view('dashboard', ['tweets' => $searchTweet]);
    }
}
