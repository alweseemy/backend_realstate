<?php

namespace App\Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\UnitType;
use App\Modules\Api\Resources\UnitTypeResource;
use App\Modules\Api\Services\UnitTypeApiService;
use Illuminate\Http\Request;

class UnitTypeApiController extends Controller
{
    protected $service;

    public function __construct(UnitTypeApiService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $items = $this->service->index($request);

        return response()->json([
            'success' => true,
            'data' => UnitTypeResource::collection($items),
            'meta' => [
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'per_page' => $items->perPage(),
                'total' => $items->total(),
                'count' => $items->count(),
            ],
        ]);
    }

    public function show(UnitType $unitType)
    {
        return response()->json([
            'success' => true,
            'data' => new UnitTypeResource($this->service->show($unitType)),
        ]);
    }
}
