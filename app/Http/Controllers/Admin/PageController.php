<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'content_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_ar' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_ar' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title_en']);

        Page::create($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', __('Page created successfully.'));
    }

    public function show(Page $page)
    {
        return view('admin.pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title_en' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'content_en' => 'nullable|string',
            'content_ar' => 'nullable|string',
            'meta_title_en' => 'nullable|string|max:255',
            'meta_title_ar' => 'nullable|string|max:255',
            'meta_description_en' => 'nullable|string',
            'meta_description_ar' => 'nullable|string',
            'status' => 'boolean',
        ]);

        $validated['slug'] = Str::slug($validated['title_en']);

        $page->update($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', __('Page updated successfully.'));
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', __('Page deleted successfully.'));
    }
}
