@extends('layouts.app')

@section('title', __('Services'))

@section('content')
    <div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white pt-32 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 fade-in">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ __('Our Services') }}</h1>
            <p class="text-xl text-primary-100 max-w-2xl">{{ __('Comprehensive solutions tailored to your needs') }}</p>
        </div>
    </div>

    <section class="section-padding bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($services->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($services as $index => $service)
                        <div class="service-card fade-in animate-stagger" style="transition-delay: {{ $index * 0.1 }}s;">
                            @if($service->image)
                                <div class="relative overflow-hidden h-64">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                </div>
                            @endif
                            <div class="p-8">
                                @if($service->icon)
                                    <div class="text-5xl mb-6 transform group-hover:scale-110 transition-transform duration-300">{{ $service->icon }}</div>
                                @endif
                                <h3 class="text-2xl font-bold mb-4 text-gray-900">{{ $service->title }}</h3>
                                <p class="text-gray-600 mb-6 leading-relaxed">{{ $service->description }}</p>
                                <a href="{{ route('services.show', $service) }}" class="inline-flex items-center text-primary-600 font-semibold hover:text-primary-700 transition-colors duration-300 group">
                                    {{ __('Learn More') }}
                                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20 fade-in">
                    <div class="max-w-md mx-auto">
                        <svg class="w-24 h-24 mx-auto text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <p class="text-xl text-gray-600">{{ __('No services available at the moment.') }}</p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-padding bg-gradient-to-r from-primary-600 to-primary-800 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('Need a Custom Solution?') }}</h2>
            <p class="text-xl mb-8 text-primary-100">{{ __('Contact us to discuss your specific requirements') }}</p>
            <a href="{{ route('contact') }}" class="btn-primary bg-white text-primary-600 hover:bg-gray-100">
                {{ __('Get In Touch') }}
            </a>
        </div>
    </section>
@endsection
