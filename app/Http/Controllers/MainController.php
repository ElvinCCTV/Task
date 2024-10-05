<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request, City $city = null)
    {
        $cities = City::all();

        // Check if a new city is being selected via query parameter
        $newCitySlug = $request->query('city');
        if ($newCitySlug) {
            $newCity = City::where('slug', $newCitySlug)->first();
            if ($newCity) {
                // Update the session with the new city
                session(['selected_city' => $newCity]);
                // Redirect to the new city's home page
                return redirect()->route('city.home', ['city' => $newCity->slug]);
            }
        }

        // If we're on a city-specific route, use that city
        if ($city) {
            session(['selected_city' => $city]);
        } else {
            // If no city is specified, use the one from the session or redirect to the homepage
            $city = session('selected_city');
            if ($city && $request->is('/')) {
                return redirect()->route('city.home', ['city' => $city->slug]);
            }
        }

        return view('home', compact('cities', 'city'));
    }

    public function about(Request $request, City $city = null)
    {
        if (!$city) {
            $city = session('selected_city');
        }
        return view('about', compact('city'));
    }

    public function news(Request $request, City $city = null)
    {
        if (!$city) {
            $city = session('selected_city');
        }
        return view('news', compact('city'));
    }
}
