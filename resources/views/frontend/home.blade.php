@extends('layouts.app')

@section('title', __('Home'))

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white pt-32 pb-20 overflow-hidden">
        <div class="absolute inset-0 bg-black/10"></div>
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl float-animation"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl float-animation" style="animation-delay: 2s;"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center fade-in">
                <p class="text-primary-200 text-lg md:text-xl mb-4 font-medium">{{ __('The Next Step to Enhance Your Business') }}</p>
                <h1 class="hero-title mb-6">
                    {{ __('Boost Your Presence with') }} <span class="text-yellow-300">{{ __('App Name') }}</span>
                </h1>
                <p class="hero-subtitle mb-10 max-w-3xl mx-auto">
                    {{ __('We develop all websites and web systems with the latest technologies, keeping pace with the rapid technical development in the web world.') }}
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                    <a href="{{ route('contact') }}" class="btn-primary text-lg px-10 py-4">
                        {{ __('Get Started Now') }}
                    </a>
                    <a href="{{ route('portfolio.index') }}" class="btn-secondary text-lg px-10 py-4">
                        {{ __('View Our Work') }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Overview -->
    @if($services->count() > 0)
    <section class="section-padding bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ __('Our Services') }}</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('Comprehensive solutions for your digital needs') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $index => $service)
                <div class="service-card fade-in animate-stagger" style="transition-delay: {{ $index * 0.1 }}s;">
                    @if($service->image)
                        <div class="relative overflow-hidden h-56">
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        </div>
                    @endif
                    <div class="p-8">
                        @if($service->icon)
                            <div class="text-5xl mb-6 transform group-hover:scale-110 transition-transform duration-300">{{ $service->icon }}</div>
                        @endif
                        <h3 class="text-2xl font-bold mb-4 text-gray-900">{{ $service->title }}</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">{{ Str::limit($service->description, 120) }}</p>
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
            
            <div class="text-center mt-12 fade-in">
                <a href="{{ route('services.index') }}" class="btn-primary">
                    {{ __('View All Services') }}
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Why Choose Us / Features -->
    <section class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <p class="text-primary-600 font-semibold mb-2">{{ __('Features') }}</p>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ __('Why Choose Us?') }}</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('In our work, satisfying our clients and users is the most important, focusing on ease of use and service quality') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center fade-in scale-in">
                    <div class="feature-icon mx-auto mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">{{ __('Speed') }}</h3>
                    <p class="text-gray-600">{{ __('Fast and efficient delivery of projects') }}</p>
                </div>
                
                <div class="text-center fade-in scale-in" style="transition-delay: 0.1s;">
                    <div class="feature-icon mx-auto mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">{{ __('Technical Support') }}</h3>
                    <p class="text-gray-600">{{ __('Continuous technical support for all clients') }}</p>
                </div>
                
                <div class="text-center fade-in scale-in" style="transition-delay: 0.2s;">
                    <div class="feature-icon mx-auto mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">{{ __('Security') }}</h3>
                    <p class="text-gray-600">{{ __('High-level security and protection') }}</p>
                </div>
                
                <div class="text-center fade-in scale-in" style="transition-delay: 0.3s;">
                    <div class="feature-icon mx-auto mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">{{ __('Performance') }}</h3>
                    <p class="text-gray-600">{{ __('Optimized performance and efficiency') }}</p>
                </div>
                
                <div class="text-center fade-in scale-in" style="transition-delay: 0.4s;">
                    <div class="feature-icon mx-auto mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">{{ __('Compatibility') }}</h3>
                    <p class="text-gray-600">{{ __('Full compatibility across all devices') }}</p>
                </div>
                
                <div class="text-center fade-in scale-in" style="transition-delay: 0.5s;">
                    <div class="feature-icon mx-auto mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">{{ __('Scalability') }}</h3>
                    <p class="text-gray-600">{{ __('From small to large projects') }}</p>
                </div>
                
                <div class="text-center fade-in scale-in" style="transition-delay: 0.6s;">
                    <div class="feature-icon mx-auto mb-6">
                        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-900">{{ __('Multilingual') }}</h3>
                    <p class="text-gray-600">{{ __('Support for multiple languages') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Highlights -->
    @if($portfolio->count() > 0)
    <section class="section-padding bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <p class="text-primary-600 font-semibold mb-2">{{ __('Achievements We Are Proud Of') }}</p>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ __('Our Portfolio') }}</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">{{ __('Get to know us and some examples of our work that we provide to you with care, with a specialized team to build your ideas and turn your visions into tangible reality.') }}</p>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mt-2">{{ __('And don\'t forget to request your service now to join our list of distinguished clients.') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($portfolio as $index => $item)
                <div class="portfolio-item fade-in animate-stagger" style="transition-delay: {{ $index * 0.1 }}s;" onclick="window.location='{{ route('portfolio.show', $item) }}'">
                    @if($item->image)
                        <div class="relative overflow-hidden h-64">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-500" loading="lazy">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                                <div class="text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    <span class="text-sm text-primary-300 font-semibold">{{ $item->category }}</span>
                                    <h3 class="text-xl font-bold mt-2">{{ $item->title }}</h3>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="p-6">
                        <span class="text-sm text-primary-600 font-semibold">{{ $item->category }}</span>
                        <h3 class="text-xl font-bold mt-2 mb-3 text-gray-900">{{ $item->title }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ Str::limit($item->description, 100) }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="text-center mt-12 fade-in">
                <a href="{{ route('portfolio.index') }}" class="btn-primary">
                    {{ __('View More +') }}
                </a>
            </div>
        </div>
    </section>
    @endif

    <!-- Testimonials -->
    @if($testimonials->count() > 0)
    <section class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">{{ __('What Our Clients Say') }}</h2>
                <p class="text-lg text-gray-600">{{ __('Testimonials from our satisfied clients') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($testimonials as $index => $testimonial)
                <div class="card p-8 fade-in scale-in" style="transition-delay: {{ $index * 0.1 }}s;">
                    <div class="flex items-center mb-6">
                        @for($i = 0; $i < $testimonial->rating; $i++)
                            <svg class="w-6 h-6 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                            </svg>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 italic text-lg leading-relaxed">"{{ $testimonial->content }}"</p>
                    <div class="flex items-center">
                        @if($testimonial->image)
                            <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="w-14 h-14 rounded-full mr-4 object-cover" loading="lazy">
                        @endif
                        <div>
                            <p class="font-bold text-gray-900">{{ $testimonial->name }}</p>
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
    <section class="section-padding bg-gradient-to-r from-primary-600 to-primary-800 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 fade-in">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">{{ __('Ready to Start Your Project?') }}</h2>
            <p class="text-xl mb-10 text-primary-100 max-w-2xl mx-auto">{{ __('Let\'s discuss how we can help bring your vision to life. Don\'t forget to request your service now to join our list of distinguished clients.') }}</p>
            <a href="{{ route('contact') }}" class="btn-primary bg-white text-primary-600 hover:bg-gray-100 text-lg px-10 py-4">
                {{ __('Get In Touch') }}
            </a>
        </div>
    </section>
@endsection
