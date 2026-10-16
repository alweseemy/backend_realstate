<?php

namespace App\Modules\Api\Services;

use App\Models\Hood;
use Illuminate\Http\Request;

class HoodApiService
{
    public function index(Request $request)
    {
        $query = Hood::query()->with(['city']);

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where('name', 'like', "%{$search}%");
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->input('city_id'));
        }

        $perPage = (int) $request->input('per_page', 15);
        $perPage = max(1, min($perPage, 100));

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function show(Hood $hood)
    {
        return $hood->load(['city']);
    }
}
