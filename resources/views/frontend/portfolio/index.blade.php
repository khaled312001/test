@extends('layouts.app')

@section('title', __('Portfolio'))

@section('content')
    <div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white pt-32 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 fade-in">
            <p class="text-primary-200 font-semibold mb-2">{{ __('Achievements We Are Proud Of') }}</p>
            <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ __('Our Portfolio') }}</h1>
            <p class="text-xl text-primary-100 max-w-2xl">{{ __('Showcasing our best work and achievements') }}</p>
        </div>
    </div>

    <section class="section-padding bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($categories->count() > 0)
                <div class="mb-12 flex flex-wrap gap-3 justify-center fade-in">
                    <a href="{{ route('portfolio.index') }}" 
                       class="px-6 py-3 rounded-lg font-medium transition-all duration-300 {{ !request('category') ? 'bg-primary-600 text-white shadow-lg scale-105' : 'bg-white text-gray-700 hover:bg-primary-50 hover:text-primary-600 shadow-md' }}">
                        {{ __('All') }}
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('portfolio.index', ['category' => $category]) }}" 
                           class="px-6 py-3 rounded-lg font-medium transition-all duration-300 {{ request('category') === $category ? 'bg-primary-600 text-white shadow-lg scale-105' : 'bg-white text-gray-700 hover:bg-primary-50 hover:text-primary-600 shadow-md' }}">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
            @endif

            @if($portfolio->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($portfolio as $index => $item)
                        <div class="portfolio-item fade-in animate-stagger" style="transition-delay: {{ $index * 0.1 }}s;" onclick="window.location='{{ route('portfolio.show', $item) }}'">
                            @if($item->image)
                                <div class="relative overflow-hidden h-72">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-500" loading="lazy">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                        <div class="text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                            <span class="text-sm text-primary-300 font-semibold uppercase tracking-wide">{{ $item->category }}</span>
                                            <h3 class="text-2xl font-bold mt-2 mb-2">{{ $item->title }}</h3>
                                            <p class="text-sm text-gray-300 line-clamp-2">{{ Str::limit($item->description, 80) }}</p>
                                            <span class="inline-block mt-4 text-primary-300 font-semibold">{{ __('View Project') }} →</span>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="p-6 bg-white">
                                <span class="text-sm text-primary-600 font-semibold uppercase tracking-wide">{{ $item->category }}</span>
                                <h3 class="text-xl font-bold mt-2 mb-3 text-gray-900">{{ $item->title }}</h3>
                                <p class="text-gray-600 leading-relaxed">{{ Str::limit($item->description, 100) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 fade-in">
                    <div class="max-w-md mx-auto">
                        <svg class="w-24 h-24 mx-auto text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        <p class="text-xl text-gray-600">{{ __('No portfolio items available at the moment.') }}</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-padding bg-gradient-to-r from-primary-600 to-primary-800 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('Have a Project in Mind?') }}</h2>
            <p class="text-xl mb-8 text-primary-100">{{ __('Let's work together to bring your ideas to life') }}</p>
            <a href="{{ route('contact') }}" class="btn-primary bg-white text-primary-600 hover:bg-gray-100">
                {{ __('Start Your Project') }}
            </a>
        </div>
    </section>
@endsection
