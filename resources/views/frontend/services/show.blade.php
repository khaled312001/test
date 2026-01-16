@extends('layouts.app')

@section('title', $service->title)
@php
    $metaTitle = $service->meta_title ?: $service->title;
    $metaDescription = $service->meta_description ?: $service->description;
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
                    <li><a href="{{ route('services.index') }}" class="text-primary-600 hover:underline">{{ __('Services') }}</a></li>
                    <li class="text-gray-500">/</li>
                    <li class="text-gray-700">{{ $service->title }}</li>
                </ol>
            </nav>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ $service->title }}</h1>
        </div>
    </div>

    <section class="section-padding">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-96 object-cover rounded-lg mb-8" loading="lazy">
            @endif

            <div class="prose max-w-none">
                {!! nl2br(e($service->content)) !!}
            </div>

            @if($relatedServices->count() > 0)
                <div class="mt-16">
                    <h2 class="text-2xl font-bold mb-6">{{ __('Related Services') }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($relatedServices as $related)
                            <div class="card">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="w-full h-32 object-cover" loading="lazy">
                                @endif
                                <div class="p-4">
                                    <h3 class="font-semibold mb-2">{{ $related->title }}</h3>
                                    <a href="{{ route('services.show', $related) }}" class="text-primary-600 text-sm hover:underline">
                                        {{ __('Learn More') }} →
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
