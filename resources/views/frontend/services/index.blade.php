@extends('layouts.app')

@section('title', __('Services'))

@section('content')
    <div class="bg-gray-50 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ __('Our Services') }}</h1>
            <p class="text-lg text-gray-600">{{ __('Comprehensive solutions tailored to your needs') }}</p>
        </div>
    </div>

    <section class="section-padding">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($services->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $service)
                        <div class="card hover:shadow-xl transition-shadow duration-300">
                            @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-48 object-cover" loading="lazy">
                            @endif
                            <div class="p-6">
                                @if($service->icon)
                                    <div class="text-4xl mb-4">{{ $service->icon }}</div>
                                @endif
                                <h3 class="text-xl font-semibold mb-3">{{ $service->title }}</h3>
                                <p class="text-gray-600 mb-4">{{ $service->description }}</p>
                                <a href="{{ route('services.show', $service) }}" class="text-primary-600 font-semibold hover:underline">
                                    {{ __('Learn More') }} →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-600">{{ __('No services available at the moment.') }}</p>
                </div>
            @endif
        </div>
    </section>
@endsection
