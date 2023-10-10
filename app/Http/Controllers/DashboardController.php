<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Summary of __invoke
     * @return \Illuminate\Support\Facades\View
     */
    public function __invoke(): View {
        return view('dashboard', [
            'tweets' => Tweet::latest('id')->get()
        ]);
    }
}
