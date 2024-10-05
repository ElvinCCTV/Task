<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        return City::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:cities',
            'hh_id' => 'required|integer|unique:cities',
        ]);

        return City::create($validated);
    }

    public function show(City $city)
    {
        return $city;
    }

    public function update(Request $request, City $city)
    {
        $validated = $request->validate([
            'name' => 'string|max:255',
            'slug' => 'string|max:255|unique:cities,slug,' . $city->id,
            'hh_id' => 'integer|unique:cities,hh_id,' . $city->id,
        ]);

        $city->update($validated);
        return $city;
    }

    public function destroy(City $city)
    {
        $city->delete();
        return response()->json(null, 204);
    }
}
