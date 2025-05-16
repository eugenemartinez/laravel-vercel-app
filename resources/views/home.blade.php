{{-- filepath: /Users/yowhenyow/Documents/Codes/laravel-experiment/laravel-vercel-app/resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'App Health Check')

@section('content')
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Laravel Vercel App Deployment Health Check</h1>
    <p class="mb-2 leading-relaxed"><strong>Status:</strong> <span class="text-green-600 font-bold">Application is running!</span></p>
    <p><strong>PHP Version:</strong> {{ phpversion() }}</p>
    <p><strong>Laravel Version:</strong> {{ app()->version() }}</p>
    <p><strong>Environment:</strong> {{ app()->environment() }}</p>
    <p><strong>Debug Mode:</strong> {{ config('app.debug') ? 'True' : 'False' }}</p>
@endsection
