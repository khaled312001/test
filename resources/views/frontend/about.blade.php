@extends('layouts.app')

@section('title', __('About Us'))

@section('content')
    <div class="bg-gray-50 pt-24 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">{{ __('About Us') }}</h1>
        </div>
    </div>

    <section class="section-padding">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($page && $page->content)
                <div class="prose max-w-none">
                    {!! nl2br(e($page->content)) !!}
                </div>
            @else
                <div class="prose max-w-none">
                    <h2>{{ __('Who We Are') }}</h2>
                    <p>{{ __('We are a modern web and app development agency dedicated to creating exceptional digital experiences. Our team of skilled professionals combines creativity with technical expertise to deliver solutions that drive results.') }}</p>
                    
                    <h2>{{ __('Our Mission') }}</h2>
                    <p>{{ __('To empower businesses with cutting-edge digital solutions that enhance their online presence and drive growth.') }}</p>
                    
                    <h2>{{ __('Our Values') }}</h2>
                    <ul>
                        <li>{{ __('Quality: We never compromise on quality') }}</li>
                        <li>{{ __('Innovation: We stay ahead of the curve') }}</li>
                        <li>{{ __('Client Focus: Your success is our priority') }}</li>
                        <li>{{ __('Transparency: Clear communication at every step') }}</li>
                    </ul>
                </div>
            @endif
        </div>
    </section>
@endsection
