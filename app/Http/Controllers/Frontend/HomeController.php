<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('status', true)
            ->where('featured', true)
            ->orderBy('order')
            ->limit(6)
            ->get();

        $portfolio = Portfolio::where('status', true)
            ->where('featured', true)
            ->orderBy('order')
            ->limit(6)
            ->get();

        $testimonials = Testimonial::where('status', true)
            ->where('featured', true)
            ->orderBy('order')
            ->limit(3)
            ->get();

        return view('frontend.home', compact('services', 'portfolio', 'testimonials'));
    }
}
