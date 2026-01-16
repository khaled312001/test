@extends('layouts.admin')

@section('title', __('Create Service'))
@section('page-title', __('Create Service'))

@section('content')
    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow p-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Title (English)') }} *</label>
                <input type="text" name="title_en" value="{{ old('title_en') }}" required class="w-full px-4 py-2 border rounded-lg">
                @error('title_en')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Title (Arabic)') }} *</label>
                <input type="text" name="title_ar" value="{{ old('title_ar') }}" required class="w-full px-4 py-2 border rounded-lg" dir="rtl">
                @error('title_ar')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Description (English)') }}</label>
                <textarea name="description_en" rows="3" class="w-full px-4 py-2 border rounded-lg">{{ old('description_en') }}</textarea>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Description (Arabic)') }}</label>
                <textarea name="description_ar" rows="3" class="w-full px-4 py-2 border rounded-lg" dir="rtl">{{ old('description_ar') }}</textarea>
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Content (English)') }}</label>
                <textarea name="content_en" rows="6" class="w-full px-4 py-2 border rounded-lg">{{ old('content_en') }}</textarea>
            </div>
            
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Content (Arabic)') }}</label>
                <textarea name="content_ar" rows="6" class="w-full px-4 py-2 border rounded-lg" dir="rtl">{{ old('content_ar') }}</textarea>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Icon') }}</label>
                <input type="text" name="icon" value="{{ old('icon') }}" placeholder="e.g., 🚀" class="w-full px-4 py-2 border rounded-lg">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Image') }}</label>
                <input type="file" name="image" accept="image/*" class="w-full px-4 py-2 border rounded-lg">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">{{ __('Order') }}</label>
                <input type="number" name="order" value="{{ old('order', 0) }}" class="w-full px-4 py-2 border rounded-lg">
            </div>
            
            <div class="flex items-center space-x-4">
                <label class="flex items-center">
                    <input type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }} class="mr-2">
                    <span>{{ __('Featured') }}</span>
                </label>
                <label class="flex items-center">
                    <input type="checkbox" name="status" value="1" {{ old('status', true) ? 'checked' : '' }} class="mr-2">
                    <span>{{ __('Active') }}</span>
                </label>
            </div>
        </div>
        
        <div class="mt-6 flex justify-end space-x-4">
            <a href="{{ route('admin.services.index') }}" class="btn-secondary">{{ __('Cancel') }}</a>
            <button type="submit" class="btn-primary">{{ __('Create Service') }}</button>
        </div>
    </form>
@endsection
