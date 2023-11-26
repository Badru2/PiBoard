<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tweet;
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


        return view('dashboard', [
            'tweets' => Tweet::latest('id')->get(),
            'comments' => Comment::latest('id')->get(),
        ]);
    }
}
