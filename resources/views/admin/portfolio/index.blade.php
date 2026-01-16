@extends('layouts.admin')

@section('title', __('Portfolio'))
@section('page-title', __('Portfolio'))

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">{{ __('All Portfolio Items') }}</h2>
        <a href="{{ route('admin.portfolio.create') }}" class="btn-primary">{{ __('Add New') }}</a>
    </div>
    
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Title') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Category') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Status') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($portfolio as $item)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->title }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $item->category }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full {{ $item->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $item->status ? __('Active') : __('Inactive') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.portfolio.edit', $item) }}" class="text-primary-600 hover:text-primary-900 mr-3">{{ __('Edit') }}</a>
                            <form action="{{ route('admin.portfolio.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">{{ __('No portfolio items found.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
