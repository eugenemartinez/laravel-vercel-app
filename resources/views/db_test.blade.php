{{-- filepath: /Users/yowhenyow/Documents/Codes/laravel-experiment/laravel-vercel-app/resources/views/db_test.blade.php --}}
@extends('layouts.app')

@section('title', 'Database Connection Test')

@section('content')
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Database Connection Health Check</h1>
    <p class="mb-2 leading-relaxed"><strong>Status:</strong>
        @if ($dbStatus['status'] === 'success')
            <span class="text-green-600 font-bold">{{ $dbStatus['message'] }}</span>
        @else
            <span class="text-red-600 font-bold">{{ $dbStatus['message'] }}</span>
        @endif
    </p>
    @if (isset($dbStatus['driver']))
        <p><strong>DB Driver:</strong> {{ $dbStatus['driver'] }}</p>
    @endif
    @if (isset($dbStatus['database_name']))
        <p><strong>DB Name:</strong> {{ $dbStatus['database_name'] }}</p>
    @endif
    @if (isset($dbStatus['error_details']) && config('app.debug'))
        <p><strong>Error Details (Debug Mode):</strong></p>
        {{-- You can style the <pre> tag with Tailwind as well if desired, e.g., bg-gray-100 p-4 rounded --}}
        <pre class="bg-gray-100 p-4 rounded-md overflow-x-auto">{{ $dbStatus['error_details'] }}</pre>
    @endif
@endsection
