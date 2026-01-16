@extends('layouts.admin')

@section('title', __('Settings'))
@section('page-title', __('Settings'))

@section('content')
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf
        
        <div class="space-y-6">
            <h3 class="text-lg font-semibold">{{ __('Site Information') }}</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Site Name (English)') }}</label>
                    <input type="text" name="site_name_en" value="{{ old('site_name_en', $settings['site_name_en'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Site Name (Arabic)') }}</label>
                    <input type="text" name="site_name_ar" value="{{ old('site_name_ar', $settings['site_name_ar'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg" dir="rtl">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Logo') }}</label>
                    @if(isset($settings['logo']) && $settings['logo'])
                        <img src="{{ asset('storage/' . $settings['logo']) }}" alt="Logo" class="w-32 h-32 object-contain mb-2">
                    @endif
                    <input type="file" name="logo" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Favicon') }}</label>
                    @if(isset($settings['favicon']) && $settings['favicon'])
                        <img src="{{ asset('storage/' . $settings['favicon']) }}" alt="Favicon" class="w-16 h-16 object-contain mb-2">
                    @endif
                    <input type="file" name="favicon" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            
            <h3 class="text-lg font-semibold mt-8">{{ __('Contact Information') }}</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Email') }}</label>
                    <input type="email" name="email" value="{{ old('email', $settings['email'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Phone') }}</label>
                    <input type="text" name="phone" value="{{ old('phone', $settings['phone'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Address (English)') }}</label>
                    <textarea name="address_en" rows="2" class="w-full px-4 py-2 border rounded-lg">{{ old('address_en', $settings['address_en'] ?? '') }}</textarea>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Address (Arabic)') }}</label>
                    <textarea name="address_ar" rows="2" class="w-full px-4 py-2 border rounded-lg" dir="rtl">{{ old('address_ar', $settings['address_ar'] ?? '') }}</textarea>
                </div>
            </div>
            
            <h3 class="text-lg font-semibold mt-8">{{ __('Social Media') }}</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Facebook URL') }}</label>
                    <input type="url" name="facebook" value="{{ old('facebook', $settings['facebook'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Twitter URL') }}</label>
                    <input type="url" name="twitter" value="{{ old('twitter', $settings['twitter'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Instagram URL') }}</label>
                    <input type="url" name="instagram" value="{{ old('instagram', $settings['instagram'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('LinkedIn URL') }}</label>
                    <input type="url" name="linkedin" value="{{ old('linkedin', $settings['linkedin'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('YouTube URL') }}</label>
                    <input type="url" name="youtube" value="{{ old('youtube', $settings['youtube'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            
            <h3 class="text-lg font-semibold mt-8">{{ __('Call to Action') }}</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('CTA Text (English)') }}</label>
                    <input type="text" name="cta_text_en" value="{{ old('cta_text_en', $settings['cta_text_en'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('CTA Text (Arabic)') }}</label>
                    <input type="text" name="cta_text_ar" value="{{ old('cta_text_ar', $settings['cta_text_ar'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg" dir="rtl">
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('CTA Link') }}</label>
                    <input type="url" name="cta_link" value="{{ old('cta_link', $settings['cta_link'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
                </div>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Google Map URL') }}</label>
                <input type="url" name="google_map_url" value="{{ old('google_map_url', $settings['google_map_url'] ?? '') }}" class="w-full px-4 py-2 border rounded-lg">
                <p class="text-sm text-gray-500 mt-1">{{ __('Embed URL from Google Maps') }}</p>
            </div>
        </div>
        
        <div class="mt-6 flex justify-end">
            <button type="submit" class="btn-primary">{{ __('Save Settings') }}</button>
        </div>
    </form>
@endsection
