@extends('layouts.app')

@section('title', $portfolio->title)
@php
    $metaTitle = $portfolio->meta_title ?: $portfolio->title;
    $metaDescription = $portfolio->meta_description ?: $portfolio->description;
@endphp
@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)

@section('content')
    <div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white pt-32 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 fade-in">
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                    <li><a href="{{ route('home') }}" class="text-primary-200 hover:text-white transition-colors duration-300">{{ __('Home') }}</a></li>
                    <li class="text-primary-300">/</li>
                    <li><a href="{{ route('portfolio.index') }}" class="text-primary-200 hover:text-white transition-colors duration-300">{{ __('Portfolio') }}</a></li>
                    <li class="text-primary-300">/</li>
                    <li class="text-white">{{ $portfolio->title }}</li>
                </ol>
            </nav>
            <span class="inline-block px-4 py-2 bg-white/20 rounded-full text-sm font-semibold mb-4">{{ $portfolio->category }}</span>
            <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $portfolio->title }}</h1>
            @if($portfolio->description)
                <p class="text-xl text-primary-100 max-w-3xl">{{ $portfolio->description }}</p>
            @endif
        </div>
    </div>

    <section class="section-padding bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($portfolio->image)
                <div class="mb-12 fade-in">
                    <img src="{{ asset('storage/' . $portfolio->image) }}" alt="{{ $portfolio->title }}" class="w-full h-96 md:h-[500px] object-cover rounded-xl shadow-2xl" loading="lazy">
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12 fade-in">
                @if($portfolio->client_name)
                    <div class="bg-gray-50 rounded-xl p-6">
                        <span class="text-gray-600 text-sm font-medium">{{ __('Client') }}</span>
                        <p class="font-bold text-xl text-gray-900 mt-2">{{ $portfolio->client_name }}</p>
                    </div>
                @endif
                @if($portfolio->project_date)
                    <div class="bg-gray-50 rounded-xl p-6">
                        <span class="text-gray-600 text-sm font-medium">{{ __('Date') }}</span>
                        <p class="font-bold text-xl text-gray-900 mt-2">{{ $portfolio->project_date->format('F Y') }}</p>
                    </div>
                @endif
                @if($portfolio->category)
                    <div class="bg-gray-50 rounded-xl p-6">
                        <span class="text-gray-600 text-sm font-medium">{{ __('Category') }}</span>
                        <p class="font-bold text-xl text-gray-900 mt-2">{{ $portfolio->category }}</p>
                    </div>
                @endif
                @if($portfolio->project_url)
                    <div class="bg-primary-50 rounded-xl p-6">
                        <span class="text-primary-600 text-sm font-medium">{{ __('Project Link') }}</span>
                        <a href="{{ $portfolio->project_url }}" target="_blank" class="inline-flex items-center text-primary-600 font-bold text-xl mt-2 hover:text-primary-700 transition-colors duration-300 group">
                            {{ __('View Project') }}
                            <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                @endif
            </div>

            <div class="prose prose-lg max-w-none mb-12 fade-in">
                <div class="text-gray-700 leading-relaxed whitespace-pre-line">{!! nl2br(e($portfolio->content ?: $portfolio->description)) !!}</div>
            </div>

            @if($portfolio->gallery && count($portfolio->gallery) > 0)
                <div class="mt-12 fade-in">
                    <h2 class="text-3xl font-bold mb-8 text-gray-900">{{ __('Gallery') }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($portfolio->gallery as $index => $image)
                            <div class="group cursor-pointer overflow-hidden rounded-xl shadow-lg fade-in animate-stagger" style="transition-delay: {{ $index * 0.1 }}s;">
                                <img src="{{ asset('storage/' . $image) }}" alt="{{ $portfolio->title }}" class="w-full h-64 object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            @if($relatedPortfolio->count() > 0)
                <div class="mt-20 fade-in">
                    <h2 class="text-3xl font-bold mb-8 text-gray-900">{{ __('Related Projects') }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedPortfolio as $index => $related)
                            <div class="portfolio-item fade-in animate-stagger" style="transition-delay: {{ $index * 0.1 }}s;" onclick="window.location='{{ route('portfolio.show', $related) }}'">
                                @if($related->image)
                                    <div class="relative overflow-hidden h-48">
                                        <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover transition-transform duration-500" loading="lazy">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
                                            <span class="text-white font-semibold">{{ __('View Project') }}</span>
                                        </div>
                                    </div>
                                @endif
                                <div class="p-6">
                                    <span class="text-sm text-primary-600 font-semibold">{{ $related->category }}</span>
                                    <h3 class="text-xl font-bold mt-2 mb-2 text-gray-900">{{ $related->title }}</h3>
                                    <p class="text-gray-600 text-sm">{{ Str::limit($related->description, 60) }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-padding bg-gradient-to-r from-primary-600 to-primary-800 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('Have a Similar Project?') }}</h2>
            <p class="text-xl mb-8 text-primary-100">{{ __('Let's work together to bring your vision to life') }}</p>
            <a href="{{ route('contact') }}" class="btn-primary bg-white text-primary-600 hover:bg-gray-100">
                {{ __('Start Your Project') }}
            </a>
        </div>
    </section>
@endsection
