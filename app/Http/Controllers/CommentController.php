<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['content' => 'required|min:1']);

        $input = request()->except(['_token']);
        $input['user_id'] = auth()->user()->id;

        Comment::with('user')->create($input);

        return back();
    }
}
