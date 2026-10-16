<?php

namespace App\Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Modules\Api\Resources\CityResource;
use App\Modules\Api\Services\CityApiService;
use Illuminate\Http\Request;

class CityApiController extends Controller
{
    protected $service;

    public function __construct(CityApiService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $items = $this->service->index($request);

        return response()->json([
            'success' => true,
            'data' => CityResource::collection($items),
            'meta' => [
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'per_page' => $items->perPage(),
                'total' => $items->total(),
                'count' => $items->count(),
            ],
        ]);
    }

    public function show(City $city)
    {
        return response()->json([
            'success' => true,
            'data' => new CityResource($this->service->show($city)),
        ]);
    }
}
