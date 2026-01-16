@extends('layouts.app')

@section('title', __('Contact Us'))

@section('content')
    <div class="bg-gray-50 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ __('Contact Us') }}</h1>
            <p class="text-lg text-gray-600">{{ __('Get in touch with us today') }}</p>
        </div>
    </div>

    <section class="section-padding">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Contact Form -->
                <div>
                    <h2 class="text-2xl font-bold mb-6">{{ __('Send us a Message') }}</h2>
                    
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Name') }} *</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Email') }} *</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Phone') }}</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            @error('phone')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Subject') }}</label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">
                            @error('subject')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">{{ __('Message') }} *</label>
                            <textarea name="message" id="message" rows="6" required
                                      class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit" class="btn-primary w-full">
                            {{ __('Send Message') }}
                        </button>
                    </form>
                </div>

                <!-- Contact Info -->
                <div>
                    <h2 class="text-2xl font-bold mb-6">{{ __('Contact Information') }}</h2>
                    
                    <div class="space-y-6">
                        @if(\App\Models\Setting::get('email'))
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-primary-600 mr-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-1">{{ __('Email') }}</h3>
                                    <a href="mailto:{{ \App\Models\Setting::get('email') }}" class="text-primary-600 hover:underline">
                                        {{ \App\Models\Setting::get('email') }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if(\App\Models\Setting::get('phone'))
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-primary-600 mr-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-1">{{ __('Phone') }}</h3>
                                    <a href="tel:{{ \App\Models\Setting::get('phone') }}" class="text-primary-600 hover:underline">
                                        {{ \App\Models\Setting::get('phone') }}
                                    </a>
                                </div>
                            </div>
                        @endif

                        @if(\App\Models\Setting::get('address_' . app()->getLocale()))
                            <div class="flex items-start">
                                <svg class="w-6 h-6 text-primary-600 mr-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <h3 class="font-semibold mb-1">{{ __('Address') }}</h3>
                                    <p class="text-gray-600">{{ \App\Models\Setting::get('address_' . app()->getLocale()) }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if(\App\Models\Setting::get('google_map_url'))
                        <div class="mt-8">
                            <iframe src="{{ \App\Models\Setting::get('google_map_url') }}" 
                                    width="100%" 
                                    height="300" 
                                    style="border:0;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
