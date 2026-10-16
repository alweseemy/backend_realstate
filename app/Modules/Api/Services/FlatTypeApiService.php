<?php

namespace App\Modules\Api\Services;

use App\Models\Flat_type;
use Illuminate\Http\Request;

class FlatTypeApiService
{
    public function index(Request $request)
    {
        $query = Flat_type::query();

        if ($request->filled('search')) {
            $search = trim($request->input('search'));
            $query->where('name', 'like', "%{$search}%");
        }

        $perPage = (int) $request->input('per_page', 15);
        $perPage = max(1, min($perPage, 100));

        return $query->orderByDesc('id')->paginate($perPage);
    }

    public function show(Flat_type $flatType)
    {
        return $flatType;
    }
}
