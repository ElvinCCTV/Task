@extends('layouts.app')

@section('title', 'About Us')

@section('content')
    <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h2 class="text-2xl font-bold">About Us</h2>
        </div>
        <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-5 sm:p-6">
            <p class="text-gray-700 dark:text-gray-300">
                This is the about page for the Multi-Region App. We are dedicated to providing localized information and services across multiple cities.
            </p>
            <p class="mt-4 text-gray-700 dark:text-gray-300">
                Our goal is to connect people with their local communities and provide relevant, up-to-date information for each city we serve.
            </p>
            @if($city)
                <div class="mt-6 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-md p-4">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">{{ $city->name }} Information</h3>
                    <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                        Here you can find specific information about {{ $city->name }}. We're constantly updating our database to provide the most accurate and relevant details for each city.
                    </p>
                </div>
            @endif
        </div>
    </div>
@endsection
