@php
    $locale = app()->getLocale();
    $isRtl = $locale === 'ar';
@endphp

<nav class="bg-white/95 backdrop-blur-sm shadow-md fixed w-full top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="flex items-center group">
                    @php
                        $logo = \App\Models\Setting::get('logo');
                    @endphp
                    @if($logo)
                        <img src="{{ asset('storage/' . $logo) }}" alt="{{ config('app.name') }}" class="h-12 transition-transform duration-300 group-hover:scale-110">
                    @else
                        <span class="text-3xl font-bold gradient-text transition-all duration-300 group-hover:scale-110 inline-block">{{ config('app.name') }}</span>
                    @endif
                </a>
            </div>
            
            <div class="hidden md:flex items-center space-x-8 {{ $isRtl ? 'space-x-reverse' : '' }}">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-all duration-300 relative group">
                    {{ __('Home') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('services.index') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-all duration-300 relative group">
                    {{ __('Services') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('portfolio.index') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-all duration-300 relative group">
                    {{ __('Portfolio') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-all duration-300 relative group">
                    {{ __('About') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary-600 font-medium transition-all duration-300 relative group">
                    {{ __('Contact') }}
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-primary-600 transition-all duration-300 group-hover:w-full"></span>
                </a>
                
                <!-- Language Switcher -->
                <div class="flex items-center space-x-2 {{ $isRtl ? 'space-x-reverse' : '' }} ml-4 pl-4 border-l border-gray-300">
                    <a href="{{ route('lang.switch', ['locale' => 'en']) }}" 
                       class="px-3 py-1.5 rounded-lg text-sm font-medium transition-all duration-300 {{ $locale === 'en' ? 'bg-primary-600 text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">
                        EN
                    </a>
                    <a href="{{ route('lang.switch', ['locale' => 'ar']) }}" 
                       class="px-3 py-1.5 rounded-lg text-sm font-medium transition-all duration-300 {{ $locale === 'ar' ? 'bg-primary-600 text-white shadow-md' : 'text-gray-700 hover:bg-gray-100' }}">
                        AR
                    </a>
                </div>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="text-gray-700 hover:text-primary-600 transition-colors duration-300 p-2" id="mobile-menu-button">
                    <svg class="h-6 w-6 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Mobile menu -->
    <div class="hidden md:hidden bg-white border-t shadow-lg" id="mobile-menu">
        <div class="px-4 pt-2 pb-4 space-y-1">
            <a href="{{ route('home') }}" class="block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-all duration-300 font-medium">{{ __('Home') }}</a>
            <a href="{{ route('services.index') }}" class="block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-all duration-300 font-medium">{{ __('Services') }}</a>
            <a href="{{ route('portfolio.index') }}" class="block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-all duration-300 font-medium">{{ __('Portfolio') }}</a>
            <a href="{{ route('about') }}" class="block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-all duration-300 font-medium">{{ __('About') }}</a>
            <a href="{{ route('contact') }}" class="block px-4 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 rounded-lg transition-all duration-300 font-medium">{{ __('Contact') }}</a>
            <div class="flex items-center space-x-2 px-4 py-3 border-t border-gray-200 mt-2">
                <a href="{{ route('lang.switch', ['locale' => 'en']) }}" 
                   class="flex-1 text-center px-3 py-2 rounded-lg text-sm font-medium transition-all duration-300 {{ $locale === 'en' ? 'bg-primary-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    EN
                </a>
                <a href="{{ route('lang.switch', ['locale' => 'ar']) }}" 
                   class="flex-1 text-center px-3 py-2 rounded-lg text-sm font-medium transition-all duration-300 {{ $locale === 'ar' ? 'bg-primary-600 text-white shadow-md' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    AR
                </a>
            </div>
        </div>
    </div>
</nav>
