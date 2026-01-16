<aside class="w-64 bg-gray-800 text-white flex flex-col">
    <div class="p-4">
        <h2 class="text-xl font-bold">{{ config('app.name') }}</h2>
        <p class="text-sm text-gray-400">{{ __('Admin Panel') }}</p>
    </div>
    
    <nav class="flex-1 px-4 py-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" 
           class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-primary-600' : 'hover:bg-gray-700' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            {{ __('Dashboard') }}
        </a>
        
        <a href="{{ route('admin.services.index') }}" 
           class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('admin.services.*') ? 'bg-primary-600' : 'hover:bg-gray-700' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            {{ __('Services') }}
        </a>
        
        <a href="{{ route('admin.portfolio.index') }}" 
           class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('admin.portfolio.*') ? 'bg-primary-600' : 'hover:bg-gray-700' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            {{ __('Portfolio') }}
        </a>
        
        <a href="{{ route('admin.testimonials.index') }}" 
           class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('admin.testimonials.*') ? 'bg-primary-600' : 'hover:bg-gray-700' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
            </svg>
            {{ __('Testimonials') }}
        </a>
        
                    <a href="{{ route('admin.contacts.index') }}" 
           class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('admin.contacts.*') ? 'bg-primary-600' : 'hover:bg-gray-700' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            {{ __('Contact Submissions') }}
            @php($unreadCount = \App\Models\Contact::where('read', false)->count())
            @if($unreadCount > 0)
                <span class="ml-auto bg-red-500 text-white text-xs px-2 py-1 rounded-full">{{ $unreadCount }}</span>
            @endif
        </a>
        
        <a href="{{ route('admin.pages.index') }}" 
           class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('admin.pages.*') ? 'bg-primary-600' : 'hover:bg-gray-700' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            {{ __('Pages') }}
        </a>
        
        <a href="{{ route('admin.settings.index') }}" 
           class="flex items-center px-4 py-2 rounded-lg {{ request()->routeIs('admin.settings.*') ? 'bg-primary-600' : 'hover:bg-gray-700' }}">
            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            {{ __('Settings') }}
        </a>
    </nav>
    
    <div class="p-4 border-t border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center px-4 py-2 rounded-lg hover:bg-gray-700">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                {{ __('Logout') }}
            </button>
        </form>
    </div>
</aside>
