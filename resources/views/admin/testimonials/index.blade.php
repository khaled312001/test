@extends('layouts.admin')

@section('title', __('Testimonials'))
@section('page-title', __('Testimonials'))

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">{{ __('All Testimonials') }}</h2>
        <a href="{{ route('admin.testimonials.create') }}" class="btn-primary">{{ __('Add New') }}</a>
    </div>
    
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Name') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Company') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Rating') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Status') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($testimonials as $testimonial)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $testimonial->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $testimonial->company ?: '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ str_repeat('⭐', $testimonial->rating) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full {{ $testimonial->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $testimonial->status ? __('Active') : __('Inactive') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-primary-600 hover:text-primary-900 mr-3">{{ __('Edit') }}</a>
                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">{{ __('No testimonials found.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
