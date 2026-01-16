<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position_en' => 'nullable|string|max:255',
            'position_ar' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'rating' => 'integer|min:1|max:5',
            'featured' => 'boolean',
            'order' => 'integer',
            'status' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', __('Testimonial created successfully.'));
    }

    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'position_en' => 'nullable|string|max:255',
            'position_ar' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'content_en' => 'required|string',
            'content_ar' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'rating' => 'integer|min:1|max:5',
            'featured' => 'boolean',
            'order' => 'integer',
            'status' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($testimonial->image) {
                Storage::disk('public')->delete($testimonial->image);
            }
            $validated['image'] = $request->file('image')->store('testimonials', 'public');
        }

        $testimonial->update($validated);

        return redirect()->route('admin.testimonials.index')
            ->with('success', __('Testimonial updated successfully.'));
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            Storage::disk('public')->delete($testimonial->image);
        }
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')
            ->with('success', __('Testimonial deleted successfully.'));
    }
}
