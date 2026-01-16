<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center justify-between px-6 py-4">
        <h1 class="text-2xl font-semibold text-gray-800">@yield('page-title', __('Dashboard'))</h1>
        
        <div class="flex items-center space-x-4">
            <a href="{{ route('home') }}" target="_blank" class="text-gray-600 hover:text-primary-600">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>
            
            <div class="flex items-center space-x-2">
                <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>
            </div>
        </div>
    </div>
</header>
