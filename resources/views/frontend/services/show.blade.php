@extends('layouts.app')

@section('title', $service->title)
@php
    $metaTitle = $service->meta_title ?: $service->title;
    $metaDescription = $service->meta_description ?: $service->description;
@endphp
@section('meta_title', $metaTitle)
@section('meta_description', $metaDescription)

@section('content')
    <div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white pt-32 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 fade-in">
            <nav class="mb-6">
                <ol class="flex items-center space-x-2 text-sm {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                    <li><a href="{{ route('home') }}" class="text-primary-200 hover:text-white transition-colors duration-300">{{ __('Home') }}</a></li>
                    <li class="text-primary-300">/</li>
                    <li><a href="{{ route('services.index') }}" class="text-primary-200 hover:text-white transition-colors duration-300">{{ __('Services') }}</a></li>
                    <li class="text-primary-300">/</li>
                    <li class="text-white">{{ $service->title }}</li>
                </ol>
            </nav>
            <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ $service->title }}</h1>
            @if($service->description)
                <p class="text-xl text-primary-100 max-w-3xl">{{ $service->description }}</p>
            @endif
        </div>
    </div>

    <section class="section-padding bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($service->image)
                <div class="mb-12 fade-in">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-96 md:h-[500px] object-cover rounded-xl shadow-2xl" loading="lazy">
                </div>
            @endif

            <div class="prose prose-lg max-w-none fade-in">
                <div class="text-gray-700 leading-relaxed whitespace-pre-line">{!! nl2br(e($service->content ?: $service->description)) !!}</div>
            </div>

            @if($relatedServices->count() > 0)
                <div class="mt-20 fade-in">
                    <h2 class="text-3xl font-bold mb-8 text-gray-900">{{ __('Related Services') }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedServices as $index => $related)
                            <div class="service-card fade-in animate-stagger" style="transition-delay: {{ $index * 0.1 }}s;" onclick="window.location='{{ route('services.show', $related) }}'">
                                @if($related->image)
                                    <div class="relative overflow-hidden h-48">
                                        <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                                    </div>
                                @endif
                                <div class="p-6">
                                    <h3 class="text-xl font-bold mb-3 text-gray-900">{{ $related->title }}</h3>
                                    <p class="text-gray-600 mb-4 text-sm">{{ Str::limit($related->description, 80) }}</p>
                                    <a href="{{ route('services.show', $related) }}" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 transition-colors duration-300 group text-sm">
                                        {{ __('Learn More') }}
                                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </a>
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
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('Interested in This Service?') }}</h2>
            <p class="text-xl mb-8 text-primary-100">{{ __('Contact us to discuss your project requirements') }}</p>
            <a href="{{ route('contact') }}" class="btn-primary bg-white text-primary-600 hover:bg-gray-100">
                {{ __('Get In Touch') }}
            </a>
        </div>
    </section>
@endsection
