@extends('layouts.app')

@section('title', __('Contact Us'))

@section('content')
    <div class="bg-gradient-to-br from-primary-600 to-primary-800 text-white pt-32 pb-16 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 fade-in">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ __('Contact Us') }}</h1>
            <p class="text-xl text-primary-100 max-w-2xl">{{ __('You may not be able to know much about us here, so we are honored to respond to all your inquiries sent through the following means:') }}</p>
        </div>
    </div>

    <section class="section-padding bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div class="fade-in slide-in-left">
                    <div class="bg-white rounded-xl shadow-lg p-8">
                        <h2 class="text-3xl font-bold mb-6 text-gray-900">{{ __('Send us a Message') }}</h2>
                        <p class="text-gray-600 mb-6">{{ __('You may not be able to know much about us here, so we are honored to respond to all your inquiries sent through the following means:') }}</p>
                        
                        @if(session('success'))
                            <div class="bg-green-50 border-l-4 border-green-400 text-green-700 px-4 py-3 rounded mb-6 fade-in">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    {{ session('success') }}
                                </div>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="bg-red-50 border-l-4 border-red-400 text-red-700 px-4 py-3 rounded mb-6 fade-in">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                    </svg>
                                    {{ session('error') }}
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Name') }} *</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300">
                                @error('name')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Email') }} *</label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300">
                                @error('email')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Phone') }}</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300">
                                @error('phone')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Subject') }}</label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300">
                                @error('subject')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">{{ __('Message') }} *</label>
                                <textarea name="message" id="message" rows="6" required
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-300 resize-none">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit" class="btn-primary w-full text-lg py-4">
                                {{ __('Send Message') }}
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="fade-in slide-in-right">
                    <div class="bg-white rounded-xl shadow-lg p-8 h-full">
                        <h2 class="text-3xl font-bold mb-8 text-gray-900">{{ __('Contact Information') }}</h2>
                        
                        <div class="space-y-8">
                            @if(\App\Models\Setting::get('email'))
                                <div class="flex items-start group">
                                    <div class="feature-icon w-14 h-14 flex-shrink-0">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                    <div class="ml-6">
                                        <h3 class="font-bold text-lg mb-1 text-gray-900">{{ __('Email') }}</h3>
                                        <a href="mailto:{{ \App\Models\Setting::get('email') }}" class="text-primary-600 hover:text-primary-700 transition-colors duration-300">
                                            {{ \App\Models\Setting::get('email') }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if(\App\Models\Setting::get('phone'))
                                <div class="flex items-start group">
                                    <div class="feature-icon w-14 h-14 flex-shrink-0">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                    <div class="ml-6">
                                        <h3 class="font-bold text-lg mb-1 text-gray-900">{{ __('Phone') }}</h3>
                                        <a href="tel:{{ \App\Models\Setting::get('phone') }}" class="text-primary-600 hover:text-primary-700 transition-colors duration-300">
                                            {{ \App\Models\Setting::get('phone') }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            @if(\App\Models\Setting::get('address_' . app()->getLocale()))
                                <div class="flex items-start group">
                                    <div class="feature-icon w-14 h-14 flex-shrink-0">
                                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                    </div>
                                    <div class="ml-6">
                                        <h3 class="font-bold text-lg mb-1 text-gray-900">{{ __('Address') }}</h3>
                                        <p class="text-gray-600 leading-relaxed">{{ \App\Models\Setting::get('address_' . app()->getLocale()) }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if(\App\Models\Setting::get('google_map_url'))
                            <div class="mt-8 rounded-lg overflow-hidden shadow-lg">
                                <iframe src="{{ \App\Models\Setting::get('google_map_url') }}" 
                                        width="100%" 
                                        height="300" 
                                        style="border:0;" 
                                        allowfullscreen="" 
                                        loading="lazy" 
                                        referrerpolicy="no-referrer-when-downgrade"
                                        class="rounded-lg">
                                </iframe>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
