<?php

namespace App\Modules\Api\Services;

use App\Models\Flat;
use Illuminate\Http\Request;

class FlatApiService
{
    public function index(Request $request)
    {
        $query = Flat::query()->with(['unit', 'flattype']);

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('unit_number', 'like', "%{$search}%")
                    ->orWhere('area', 'like', "%{$search}%")
                    ->orWhere('electric', 'like', "%{$search}%")
                    ->orWhere('water', 'like', "%{$search}%");
            });
        }

        if ($request->filled('unit_id')) {
            $query->where('unit_id', $request->input('unit_id'));
        }

        if ($request->filled('flat_type_id')) {
            $query->where('flat_type_id', $request->input('flat_type_id'));
        }

        $perPage = (int) $request->input('per_page', 15);
        $perPage = max(1, min($perPage, 100));

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function show(Flat $flat)
    {
        return $flat->load(['unit', 'flattype']);
    }
}
