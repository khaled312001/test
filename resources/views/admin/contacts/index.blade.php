@extends('layouts.admin')

@section('title', __('Contact Submissions'))
@section('page-title', __('Contact Submissions'))

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold">{{ __('Contact Submissions') }}</h2>
        <form action="{{ route('admin.contacts.export') }}" method="POST" class="inline">
            @csrf
            <button type="submit" class="btn-secondary">{{ __('Export CSV') }}</button>
        </form>
    </div>
    
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Name') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Email') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Subject') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Date') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Status') }}</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($contacts as $contact)
                    <tr class="{{ !$contact->read ? 'bg-yellow-50' : '' }}">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $contact->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $contact->email }}</td>
                        <td class="px-6 py-4">{{ $contact->subject ?: '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $contact->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 py-1 text-xs rounded-full {{ $contact->read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $contact->read ? __('Read') : __('Unread') }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('admin.contacts.show', $contact) }}" class="text-primary-600 hover:text-primary-900 mr-3">{{ __('View') }}</a>
                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="inline" onsubmit="return confirm('{{ __('Are you sure?') }}');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">{{ __('Delete') }}</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">{{ __('No contact submissions found.') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="px-6 py-4">
            {{ $contacts->links() }}
        </div>
    </div>
@endsection
