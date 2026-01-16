@extends('layouts.app')

@section('title', $portfolio->title)
@php
    $metaTitle = $portfolio->meta_title ?: $portfolio->title;
    $metaDescription = $portfolio->meta_description ?: $portfolio->description;
@endphp
@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)

@section('content')
    <div class="bg-gray-50 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav class="mb-4">
                <ol class="flex items-center space-x-2 text-sm {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                    <li><a href="{{ route('home') }}" class="text-primary-600 hover:underline">{{ __('Home') }}</a></li>
                    <li class="text-gray-500">/</li>
                    <li><a href="{{ route('portfolio.index') }}" class="text-primary-600 hover:underline">{{ __('Portfolio') }}</a></li>
                    <li class="text-gray-500">/</li>
                    <li class="text-gray-700">{{ $portfolio->title }}</li>
                </ol>
            </nav>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $portfolio->title }}</h1>
        </div>
    </div>

    <section class="section-padding">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($portfolio->image)
                <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-full h-96 object-cover rounded-lg mb-8" loading="lazy">
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                @if($portfolio->client_name)
                    <div>
                        <span class="text-gray-600">{{ __('Client') }}:</span>
                        <p class="font-semibold">{{ $portfolio->client_name }}</p>
                    </div>
                @endif
                @if($portfolio->project_date)
                    <div>
                        <span class="text-gray-600">{{ __('Date') }}:</span>
                        <p class="font-semibold">{{ $portfolio->project_date->format('F Y') }}</p>
                    </div>
                @endif
                @if($portfolio->category)
                    <div>
                        <span class="text-gray-600">{{ __('Category') }}:</span>
                        <p class="font-semibold">{{ $portfolio->category }}</p>
                    </div>
                @endif
                @if($portfolio->project_url)
                    <div>
                        <a href="{{ $portfolio->project_url }}" target="_blank" class="text-primary-600 hover:underline">
                            {{ __('View Project') }} →
                        </a>
                    </div>
                @endif
            </div>

            <div class="prose max-w-none mb-8">
                {!! nl2br(e($portfolio->content)) !!}
            </div>

            @if($portfolio->gallery && count($portfolio->gallery) > 0)
                <div class="mt-12">
                    <h2 class="text-2xl font-bold mb-6">{{ __('Gallery') }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($portfolio->gallery as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="{{ $portfolio->title }}" class="w-full h-64 object-cover rounded-lg" loading="lazy">
                        @endforeach
                    </div>
                </div>
            @endif

            @if($relatedPortfolio->count() > 0)
                <div class="mt-16">
                    <h2 class="text-2xl font-bold mb-6">{{ __('Related Projects') }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedPortfolio as $related)
                            <div class="card cursor-pointer" onclick="window.location='{{ route('portfolio.show', $related) }}'">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="w-full h-32 object-cover" loading="lazy">
                                @endif
                                <div class="p-4">
                                    <h3 class="font-semibold mb-2">{{ $related->title }}</h3>
                                    <a href="{{ route('portfolio.show', $related) }}" class="text-primary-600 text-sm hover:underline">
                                        {{ __('View Project') }} →
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
