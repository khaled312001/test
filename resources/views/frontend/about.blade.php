@extends('layouts.app')

@section('title', __('About Us'))

@section('content')
    <div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white pt-32 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 fade-in">
            <p class="text-primary-200 font-semibold mb-2">{{ __('Who We Are') }}</p>
            <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ __('About Us') }}</h1>
        </div>
    </div>

    <section class="section-padding bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($page && $page->content)
                <div class="prose prose-lg max-w-none fade-in">
                    <div class="text-gray-700 leading-relaxed whitespace-pre-line">{!! nl2br(e($page->content)) !!}</div>
                </div>
            @else
                <div class="prose prose-lg max-w-none fade-in">
                    <div class="space-y-8 text-gray-700 leading-relaxed">
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('Who We Are') }}</h2>
                            <p class="text-lg">{{ __('We are a modern web and app development agency dedicated to creating exceptional digital experiences. Our team of skilled professionals combines creativity with technical expertise to deliver solutions that drive results.') }}</p>
                        </div>
                        
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('Our Mission') }}</h2>
                            <p class="text-lg">{{ __('To empower businesses with cutting-edge digital solutions that enhance their online presence and drive growth.') }}</p>
                        </div>
                        
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-4">{{ __('Our Values') }}</h2>
                            <ul class="list-none space-y-3">
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-primary-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-lg"><strong>{{ __('Quality:') }}</strong> {{ __('We never compromise on quality') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-primary-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-lg"><strong>{{ __('Innovation:') }}</strong> {{ __('We stay ahead of the curve') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-primary-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-lg"><strong>{{ __('Client Focus:') }}</strong> {{ __('Your success is our priority') }}</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-primary-600 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                    <span class="text-lg"><strong>{{ __('Transparency:') }}</strong> {{ __('Clear communication at every step') }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Stats Section -->
    <section class="section-padding bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="text-center fade-in scale-in">
                    <div class="text-5xl font-bold text-primary-600 mb-2">100+</div>
                    <div class="text-gray-600 font-medium">{{ __('Projects Completed') }}</div>
                </div>
                <div class="text-center fade-in scale-in" style="transition-delay: 0.1s;">
                    <div class="text-5xl font-bold text-primary-600 mb-2">50+</div>
                    <div class="text-gray-600 font-medium">{{ __('Happy Clients') }}</div>
                </div>
                <div class="text-center fade-in scale-in" style="transition-delay: 0.2s;">
                    <div class="text-5xl font-bold text-primary-600 mb-2">10+</div>
                    <div class="text-gray-600 font-medium">{{ __('Years Experience') }}</div>
                </div>
                <div class="text-center fade-in scale-in" style="transition-delay: 0.3s;">
                    <div class="text-5xl font-bold text-primary-600 mb-2">24/7</div>
                    <div class="text-gray-600 font-medium">{{ __('Support Available') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="section-padding bg-gradient-to-r from-primary-600 to-primary-800 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center fade-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ __('Want to Work With Us?') }}</h2>
            <p class="text-xl mb-8 text-primary-100">{{ __('Let's discuss how we can help your business grow') }}</p>
            <a href="{{ route('contact') }}" class="btn-primary bg-white text-primary-600 hover:bg-gray-100">
                {{ __('Contact Us') }}
            </a>
        </div>
    </section>
@endsection
