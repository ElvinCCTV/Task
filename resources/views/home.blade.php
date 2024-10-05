@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Welcome to the Multi-Region App</h2>

    <div class="bg-white dark:bg-gray-800 shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium">Select a City</h3>
        </div>
        <div class="border-t border-gray-200 dark:border-gray-700">
            @php
                $mainCities = $cities->whereIn('name', ['Москва', 'Санкт-Петербург']);
                $groupedCities = $cities->whereNotIn('name', ['Москва', 'Санкт-Петербург'])
                                        ->where('region', '!=', 'Россия')
                                        ->groupBy('region');
            @endphp
            <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                {{-- Main Cities --}}
                @foreach($mainCities as $cityItem)
                    <li>
                        <a href="{{ route('city.home', ['city' => $cityItem->slug]) }}"
                           class="block px-4 py-4 sm:px-6 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150 ease-in-out">
                            <div class="flex items-center justify-between">
                                <p class="text-lg font-medium {{ $city && $city->id === $cityItem->id ? 'text-primary-600 dark:text-primary-400 font-semibold' : 'text-gray-900 dark:text-white' }}">
                                    {{ $cityItem->name }}
                                </p>
                                @if($city && $city->id === $cityItem->id)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary-100 dark:bg-primary-800 text-primary-800 dark:text-primary-100">
                                        Selected
                                    </span>
                                @endif
                            </div>
                        </a>
                    </li>
                @endforeach

                {{-- Other Regions and Cities --}}
                @foreach($groupedCities as $region => $citiesInRegion)
                    <li class="region-item">
                        <div class="px-4 py-4 sm:px-6 flex items-center justify-between cursor-pointer region-header">
                            <p class="text-lg font-medium text-gray-900 dark:text-white">{{ $region }}</p>
                            <svg class="h-5 w-5 text-gray-500 transform transition-transform duration-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <ul class="pl-8 cities-list hidden">
                            @foreach($citiesInRegion as $cityItem)
                                <li>
                                    <a href="{{ route('city.home', ['city' => $cityItem->slug]) }}"
                                       class="block px-4 py-2 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150 ease-in-out">
                                        <div class="flex items-center justify-between">
                                            <p class="text-sm font-medium {{ $city && $city->id === $cityItem->id ? 'text-primary-600 dark:text-primary-400 font-semibold' : 'text-gray-700 dark:text-gray-200' }}">
                                                {{ $cityItem->name }}
                                            </p>
                                            @if($city && $city->id === $cityItem->id)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-primary-100 dark:bg-primary-800 text-primary-800 dark:text-primary-100">
                                                    Selected
                                                </span>
                                            @endif
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('.region-header').forEach(header => {
                header.addEventListener('click', () => {
                    const citiesList = header.nextElementSibling;
                    citiesList.classList.toggle('hidden');
                    const arrow = header.querySelector('svg');
                    arrow.classList.toggle('rotate-180');
                });
            });
        });
    </script>
@endsection
