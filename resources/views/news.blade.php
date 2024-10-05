@extends('layouts.app')

@section('title', 'News')

@section('content')
    <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h2 class="text-2xl font-bold">News</h2>
        </div>
        <div class="border-t border-gray-200 dark:border-gray-700">
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                @for($i = 1; $i <= 5; $i++)
                    <li class="px-4 py-4 sm:px-6">
                        <div class="flex items-center justify-between">
                            <p class="text-sm font-medium text-primary-600 dark:text-primary-400 truncate">
                                News Article {{ $i }}
                            </p>
                            <div class="ml-2 flex-shrink-0 flex">
                                <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 dark:bg-green-800 text-green-800 dark:text-green-100">
                                    New
                                </p>
                            </div>
                        </div>
                        <div class="mt-2 sm:flex sm:justify-between">
                            <div class="sm:flex">
                                <p class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    Here you can find the latest news for the Multi-Region App. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </p>
                            </div>
                            <div class="mt-2 flex items-center text-sm text-gray-500 dark:text-gray-400 sm:mt-0">
                                <p>
                                    Published on {{ date('F j, Y') }}
                                </p>
                            </div>
                        </div>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
    @if($city)
        <div class="mt-8 bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white">{{ $city->name }} Local News</h3>
            </div>
            <div class="border-t border-gray-200 dark:border-gray-700 px-4 py-5 sm:p-6">
                <p class="text-gray-700 dark:text-gray-300">
                    Here you can find local news specific to {{ $city->name }}. Stay tuned for updates!
                </p>
            </div>
        </div>
    @endif
@endsection
