<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Models\Tweet;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TweetShowController extends Controller
{
    public function __invoke($id): View
    {
        $tweet = Tweet::where('id', $id)->first();

        return view("tweets.show", compact("tweet"));
    }
}
