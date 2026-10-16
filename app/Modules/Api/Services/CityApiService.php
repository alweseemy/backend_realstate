<?php

namespace App\Modules\Api\Services;

use App\Models\City;
use Illuminate\Http\Request;

class CityApiService
{
    public function index(Request $request)
    {
        $query = City::query();

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where('name', 'like', "%{$search}%");
        }

        if ($request->filled('country_id')) {
            $query->where('country_id', $request->input('country_id'));
        }

        if ($request->filled('state_id')) {
            $query->where('state_id', $request->input('state_id'));
        }

        $perPage = (int) $request->input('per_page', 15);
        $perPage = max(1, min($perPage, 100));

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function show(City $city)
    {
        return $city;
    }
}
