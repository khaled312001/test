<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $page = Page::where('slug', 'about')->first();
        return view('frontend.about', compact('page'));
    }
}
