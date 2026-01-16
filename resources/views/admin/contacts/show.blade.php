@extends('layouts.admin')

@section('title', __('View Contact'))
@section('page-title', __('View Contact'))

@section('content')
    <div class="bg-white rounded-lg shadow p-6">
        <div class="mb-6">
            <a href="{{ route('admin.contacts.index') }}" class="text-primary-600 hover:underline">← {{ __('Back') }}</a>
        </div>
        
        <div class="space-y-4">
            <div>
                <label class="text-sm font-medium text-gray-700">{{ __('Name') }}</label>
                <p class="mt-1 text-gray-900">{{ $contact->name }}</p>
            </div>
            
            <div>
                <label class="text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                <p class="mt-1 text-gray-900">{{ $contact->email }}</p>
            </div>
            
            @if($contact->phone)
                <div>
                    <label class="text-sm font-medium text-gray-700">{{ __('Phone') }}</label>
                    <p class="mt-1 text-gray-900">{{ $contact->phone }}</p>
                </div>
            @endif
            
            @if($contact->subject)
                <div>
                    <label class="text-sm font-medium text-gray-700">{{ __('Subject') }}</label>
                    <p class="mt-1 text-gray-900">{{ $contact->subject }}</p>
                </div>
            @endif
            
            <div>
                <label class="text-sm font-medium text-gray-700">{{ __('Message') }}</label>
                <p class="mt-1 text-gray-900 whitespace-pre-wrap">{{ $contact->message }}</p>
            </div>
            
            <div>
                <label class="text-sm font-medium text-gray-700">{{ __('Date') }}</label>
                <p class="mt-1 text-gray-900">{{ $contact->created_at->format('F d, Y H:i') }}</p>
            </div>
        </div>
    </div>
@endsection
