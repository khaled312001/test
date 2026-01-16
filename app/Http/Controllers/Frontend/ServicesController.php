<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::where('status', true)
            ->orderBy('order')
            ->get();

        return view('frontend.services.index', compact('services'));
    }

    public function show(Service $service)
    {
        if (!$service->status) {
            abort(404);
        }

        $relatedServices = Service::where('status', true)
            ->where('id', '!=', $service->id)
            ->limit(3)
            ->get();

        return view('frontend.services.show', compact('service', 'relatedServices'));
    }
}
