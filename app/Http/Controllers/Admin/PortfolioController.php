<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = Portfolio::orderBy('order')->get();
        return view('admin.portfolio.index', compact('portfolio'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'content_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'category_en' => 'nullable|string|max:255',
            'category_ar' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'featured' => 'boolean',
            'order' => 'integer',
            'client_name' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'project_url' => 'nullable|url|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_ar' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_ar' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title_en']);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        if ($request->hasFile('gallery')) {
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('portfolio/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        Portfolio::create($validated);

        return redirect()->route('admin.portfolio.index')
            ->with('success', __('Portfolio item created successfully.'));
    }

    public function show(Portfolio $portfolio)
    {
        return view('admin.portfolio.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description_en' => 'nullable|string',
            'description_ar' => 'nullable|string',
            'content_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'category_en' => 'nullable|string|max:255',
            'category_ar' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
            'gallery' => 'nullable|array',
            'gallery.*' => 'image|max:2048',
            'featured' => 'boolean',
            'order' => 'integer',
            'client_name' => 'nullable|string|max:255',
            'project_date' => 'nullable|date',
            'project_url' => 'nullable|url|max:255',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_ar' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_ar' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title_en']);

        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $validated['image'] = $request->file('image')->store('portfolio', 'public');
        }

        if ($request->hasFile('gallery')) {
            if ($portfolio->gallery) {
                foreach ($portfolio->gallery as $image) {
                    Storage::disk('public')->delete($image);
                }
            }
            $gallery = [];
            foreach ($request->file('gallery') as $file) {
                $gallery[] = $file->store('portfolio/gallery', 'public');
            }
            $validated['gallery'] = $gallery;
        }

        $portfolio->update($validated);

        return redirect()->route('admin.portfolio.index')
            ->with('success', __('Portfolio item updated successfully.'));
    }

    public function destroy(Portfolio $portfolio)
    {
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }
        if ($portfolio->gallery) {
            foreach ($portfolio->gallery as $image) {
                Storage::disk('public')->delete($image);
            }
        }
        $portfolio->delete();

        return redirect()->route('admin.portfolio.index')
            ->with('success', __('Portfolio item deleted successfully.'));
    }
}
