<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Contact;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'portfolio' => Portfolio::count(),
            'contacts' => Contact::where('read', false)->count(),
            'testimonials' => Testimonial::count(),
        ];

        $recentContacts = Contact::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts'));
    }
}
