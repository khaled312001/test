<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $query = Portfolio::where('status', true);

        if ($request->has('category')) {
            $locale = app()->getLocale();
            $categoryField = $locale === 'ar' ? 'category_ar' : 'category_en';
            $query->where($categoryField, $request->category);
        }

        $portfolio = $query->orderBy('order')->get();

        $categories = Portfolio::where('status', true)
            ->select('category_en', 'category_ar')
            ->distinct()
            ->get()
            ->map(function ($item) {
                return app()->getLocale() === 'ar' ? $item->category_ar : $item->category_en;
            })
            ->filter()
            ->unique()
            ->values();

        return view('frontend.portfolio.index', compact('portfolio', 'categories'));
    }

    public function show(Portfolio $portfolio)
    {
        if (!$portfolio->status) {
            abort(404);
        }

        $relatedPortfolio = Portfolio::where('status', true)
            ->where('id', '!=', $portfolio->id)
            ->limit(3)
            ->get();

        return view('frontend.portfolio.show', compact('portfolio', 'relatedPortfolio'));
    }
}
