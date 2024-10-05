<?php

namespace App\Http\Middleware;

use App\Models\City; // Make sure this import is present
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $segments = $request->segments();
        $citySlug = $segments[0] ?? null;

        if ($citySlug && $city = City::where('slug', $citySlug)->first()) {
            session(['selected_city' => $city]);
            app('url')->setCity($city);
        } elseif ($request->is('/') && $selectedCity = session('selected_city')) {
            return redirect()->route('home', ['city' => $selectedCity->slug], 301);
        }

        // Check for city query parameter
        $newCitySlug = $request->query('city');
        if ($newCitySlug && $newCity = City::where('slug', $newCitySlug)->first()) {
            session(['selected_city' => $newCity]);
            return redirect()->route('home', ['city' => $newCity->slug]);
        }

        return $next($request);
    }
}
