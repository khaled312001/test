@extends('layouts.app')

@section('title', __('Home'))

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary-600 to-primary-800 text-white pt-24 pb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">
                    {{ __('Transform Your Digital Presence') }}
                </h1>
                <p class="text-xl md:text-2xl mb-8 text-primary-100">
                    {{ __('We create stunning web and mobile applications that drive results') }}
                </p>
                <div class="flex justify-center space-x-4 {{ app()->getLocale() === 'ar' ? 'space-x-reverse' : '' }}">
                    <a href="{{ route('contact') }}" class="btn-primary bg-white text-primary-600 hover:bg-gray-100">
                        {{ __('Get Started') }}
                    </a>
                    <a href="{{ route('portfolio.index') }}" class="btn-secondary bg-transparent border-2 border-white text-white hover:bg-white hover:text-primary-600">
                        {{ __('View Portfolio') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    @if($services->count() > 0)
    <section class="section-padding bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('Our Services') }}</h2>
                <p class="text-lg text-gray-600">{{ __('Comprehensive solutions for your digital needs') }}</p>
            </div>
            
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
                        <p class="text-gray-600 mb-4">{{ Str::limit($service->description, 100) }}</p>
                        <a href="{{ route('services.show', $service) }}" class="text-primary-600 font-semibold hover:underline">
                            {{ __('Learn More') }} →
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('services.index') }}" class="btn-primary">
                    {{ __('View All Services') }}
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Why Choose Us -->
    <section class="section-padding">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('Why Choose Us') }}</h2>
                <p class="text-lg text-gray-600">{{ __('What sets us apart from the rest') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('Fast Delivery') }}</h3>
                    <p class="text-gray-600">{{ __('We deliver projects on time without compromising quality') }}</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('Quality Assurance') }}</h3>
                    <p class="text-gray-600">{{ __('Rigorous testing ensures flawless performance') }}</p>
                </div>
                
                <div class="text-center">
                    <div class="bg-primary-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">{{ __('Expert Team') }}</h3>
                    <p class="text-gray-600">{{ __('Experienced professionals dedicated to your success') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Highlights -->
    @if($portfolio->count() > 0)
    <section class="section-padding bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('Our Portfolio') }}</h2>
                <p class="text-lg text-gray-600">{{ __('Showcasing our best work') }}</p>
            </div>
            
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
                        <p class="text-gray-600">{{ Str::limit($item->description, 80) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('portfolio.index') }}" class="btn-primary">
                    {{ __('View All Projects') }}
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Testimonials -->
    @if($testimonials->count() > 0)
    <section class="section-padding">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ __('What Our Clients Say') }}</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($testimonials as $testimonial)
                <div class="card p-6">
                    <div class="flex items-center mb-4">
                        @for($i = 0; $i < $testimonial->rating; $i++)
                            <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-4 italic">"{{ $testimonial->content }}"</p>
                    <div class="flex items-center">
                        @if($testimonial->image)
                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="w-12 h-12 rounded-full mr-4" loading="lazy">
                        @endif
                        <div>
                            <p class="font-semibold">{{ $testimonial->name }}</p>
                            <p class="text-sm text-gray-600">{{ $testimonial->position }} @if($testimonial->company) - {{ $testimonial->company }} @endif</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Contact CTA -->
    <section class="section-padding bg-primary-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('Ready to Start Your Project?') }}</h2>
            <p class="text-xl mb-8 text-primary-100">{{ __('Let\'s discuss how we can help bring your vision to life') }}</p>
            <a href="{{ route('contact') }}" class="btn-primary bg-white text-primary-600 hover:bg-gray-100">
                {{ __('Get In Touch') }}
            </a>
        </div>
    </section>
@endsection
