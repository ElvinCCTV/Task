<?php
if (!function_exists('city_route')) {
    function city_route($name, $parameters = [], $absolute = true)
    {
        $city = session('selected_city');

        // Ensure $parameters is always an array
        if (!is_array($parameters)) {
            $parameters = [$parameters];
        }

        // Special handling for the home route
        if ($name === 'home' || $name === 'city.home') {
            if ($city) {
                return route('city.home', ['city' => $city->slug], $absolute);
            } else {
                return route('home', [], $absolute);
            }
        }

        // For other routes, add the city parameter if it's not already present
        if ($city && !array_key_exists('city', $parameters)) {
            $parameters = array_merge(['city' => $city->slug], $parameters);
        }

        return route($name, $parameters, $absolute);
    }
}
