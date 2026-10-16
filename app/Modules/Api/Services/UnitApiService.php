<?php

namespace App\Modules\Api\Services;

use App\Models\Unit;
use App\Modules\Api\Resources\UnitResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class UnitApiService
{
    public function index(Request $request)
    {
        $query = Unit::query()->with(['unit_type', 'owner', 'city', 'hood']);

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%")
                    ->orWhere('deed_number', 'like', "%{$search}%")
                    ->orWhere('building_number', 'like', "%{$search}%");
            });
        }

        if ($request->filled('city_id')) {
            $query->where('city_id', $request->input('city_id'));
        }

        if ($request->filled('hood_id')) {
            $query->where('hood_id', $request->input('hood_id'));
        }

        if ($request->filled('unittype_id')) {
            $query->where('unittype_id', $request->input('unittype_id'));
        }

        if ($request->filled('owner_id')) {
            $query->where('owner_id', $request->input('owner_id'));
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->input('user_id'));
        }

        if ($request->filled('status') && Schema::hasColumn('units', 'status')) {
            $query->where('status', $request->input('status'));
        }

        $perPage = (int) $request->input('per_page', 15);
        $perPage = max(1, min($perPage, 100));

        $items = $query->orderByDesc('id')->paginate($perPage);

        return [
            'items' => $items,
            'meta' => [
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'per_page' => $items->perPage(),
                'total' => $items->total(),
                'count' => $items->count(),
            ],
        ];
    }

    public function show(Unit $unit)
    {
        return $unit->load(['unit_type', 'owner', 'city', 'hood']);
    }
}
