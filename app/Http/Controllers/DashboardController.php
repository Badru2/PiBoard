<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Summary of __invoke
     * @return \Illuminate\Support\Facades\View
     */
    public function __invoke(): View
    {
        // $title = 'Delete Data';
        // $text = 'Are you sure you want to delete';
        // confirmDelete($title, $text);
        // $user = User::class();

        return view('dashboard', [
            'tweets' => Tweet::with('user', 'likes', 'comments')->latest('id')->get(),
            'comments' => Comment::with('user', 'likes', 'comments')->latest('id')->get(),
        ]);
    }
}