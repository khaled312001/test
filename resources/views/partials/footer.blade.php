@php
    $locale = app()->getLocale();
    $isRtl = $locale === 'ar';
@endphp

<footer class="bg-gray-900 text-white mt-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <!-- About -->
            <div class="fade-in">
                <h3 class="text-xl font-bold mb-6">{{ __('About Us') }}</h3>
                <p class="text-gray-400 text-sm leading-relaxed mb-4">
                    {{ __('We are a modern web and app development agency dedicated to creating exceptional digital experiences.') }}
                </p>
                @php
                    $logo = \App\Models\Setting::get('logo');
                @endphp
                @if($logo)
                    <img src="{{ asset('storage/' . $logo) }}" alt="{{ config('app.name') }}" class="h-10 mb-4">
                @else
                    <span class="text-2xl font-bold text-primary-400">{{ config('app.name') }}</span>
                @endif
            </div>
            
            <!-- Quick Links -->
            <div class="fade-in" style="transition-delay: 0.1s;">
                <h3 class="text-xl font-bold mb-6">{{ __('Quick Links') }}</h3>
                <ul class="space-y-3 text-sm">
                    <li>
                        <a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition-colors duration-300 inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-primary-500 mr-0 group-hover:mr-2 transition-all duration-300"></span>
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('services.index') }}" class="text-gray-400 hover:text-white transition-colors duration-300 inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-primary-500 mr-0 group-hover:mr-2 transition-all duration-300"></span>
                            {{ __('Services') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('portfolio.index') }}" class="text-gray-400 hover:text-white transition-colors duration-300 inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-primary-500 mr-0 group-hover:mr-2 transition-all duration-300"></span>
                            {{ __('Portfolio') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition-colors duration-300 inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-primary-500 mr-0 group-hover:mr-2 transition-all duration-300"></span>
                            {{ __('About') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition-colors duration-300 inline-flex items-center group">
                            <span class="w-0 group-hover:w-2 h-0.5 bg-primary-500 mr-0 group-hover:mr-2 transition-all duration-300"></span>
                            {{ __('Contact') }}
                        </a>
                    </li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="fade-in" style="transition-delay: 0.2s;">
                <h3 class="text-xl font-bold mb-6">{{ __('Contact') }}</h3>
                <ul class="space-y-4 text-sm text-gray-400">
                    @if(\App\Models\Setting::get('email'))
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-primary-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <a href="mailto:{{ \App\Models\Setting::get('email') }}" class="hover:text-white transition-colors duration-300">
                                {{ \App\Models\Setting::get('email') }}
                            </a>
                        </li>
                    @endif
                    @if(\App\Models\Setting::get('phone'))
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-primary-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <a href="tel:{{ \App\Models\Setting::get('phone') }}" class="hover:text-white transition-colors duration-300">
                                {{ \App\Models\Setting::get('phone') }}
                            </a>
                        </li>
                    @endif
                    @if(\App\Models\Setting::get('address_' . $locale))
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-primary-400 mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ \App\Models\Setting::get('address_' . $locale) }}</span>
                        </li>
                    @endif
                </ul>
            </div>
            
            <!-- Social Media -->
            <div class="fade-in" style="transition-delay: 0.3s;">
                <h3 class="text-xl font-bold mb-6">{{ __('Follow Us') }}</h3>
                <p class="text-gray-400 text-sm mb-6">{{ __('Stay connected with us on social media') }}</p>
                <div class="flex space-x-4 {{ $isRtl ? 'space-x-reverse' : '' }}">
                    @if(\App\Models\Setting::get('facebook'))
                        <a href="{{ \App\Models\Setting::get('facebook') }}" target="_blank" 
                           class="w-12 h-12 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition-all duration-300 transform hover:scale-110">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                    @endif
                    @if(\App\Models\Setting::get('twitter'))
                        <a href="{{ \App\Models\Setting::get('twitter') }}" target="_blank" 
                           class="w-12 h-12 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition-all duration-300 transform hover:scale-110">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                    @endif
                    @if(\App\Models\Setting::get('linkedin'))
                        <a href="{{ \App\Models\Setting::get('linkedin') }}" target="_blank" 
                           class="w-12 h-12 bg-gray-800 rounded-lg flex items-center justify-center text-gray-400 hover:text-white hover:bg-primary-600 transition-all duration-300 transform hover:scale-110">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="border-t border-gray-800 mt-12 pt-8 text-center">
            <p class="text-sm text-gray-400">
                &copy; {{ date('Y') }} {{ config('app.name') }}. {{ __('All rights reserved.') }}
            </p>
        </div>
    </div>
</footer>
