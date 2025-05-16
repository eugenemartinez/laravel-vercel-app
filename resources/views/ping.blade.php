{{-- filepath: /Users/yowhenyow/Documents/Codes/laravel-experiment/laravel-vercel-app/resources/views/ping.blade.php --}}
@extends('layouts.app')

@section('title', 'Ping')

@section('content')
    <h1 class="text-3xl font-semibold text-gray-800 mb-4">Ping</h1>
    <p><strong>Response:</strong> <span class="text-green-600 font-bold">Pong!</span></p>
    <p><strong>Timestamp:</strong> {{ $timestamp }}</p>
@endsection
