@extends('layouts.app')

@section('title', __('Portfolio'))

@section('content')
    <div class="bg-gray-50 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ __('Our Portfolio') }}</h1>
            <p class="text-lg text-gray-600">{{ __('Showcasing our best work and achievements') }}</p>
        </div>
    </div>

    <section class="section-padding">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($categories->count() > 0)
                <div class="mb-8 flex flex-wrap gap-2">
                    <a href="{{ route('portfolio.index') }}" 
                       class="px-4 py-2 rounded-lg {{ !request('category') ? 'bg-primary-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                        {{ __('All') }}
                    </a>
                    @foreach($categories as $category)
                        <a href="{{ route('portfolio.index', ['category' => $category]) }}" 
                           class="px-4 py-2 rounded-lg {{ request('category') === $category ? 'bg-primary-600 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                            {{ $category }}
                        </a>
                    @endforeach
                </div>
            @endif

            @if($portfolio->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($portfolio as $item)
                        <div class="card overflow-hidden group cursor-pointer" onclick="window.location='{{ route('portfolio.show', $item) }}'">
                            @if($item->image)
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300" loading="lazy">
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-50 transition-opacity duration-300 flex items-center justify-center">
                                        <span class="text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300">{{ __('View Project') }}</span>
                                    </div>
                                </div>
                            @endif
                            <div class="p-6">
                                <span class="text-sm text-primary-600">{{ $item->category }}</span>
                                <h3 class="text-xl font-semibold mt-2 mb-2">{{ $item->title }}</h3>
                                <p class="text-gray-600">{{ Str::limit($item->description, 100) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-600">{{ __('No portfolio items available at the moment.') }}</p>
                </div>
            @endif
        </div>
    </section>
@endsection
