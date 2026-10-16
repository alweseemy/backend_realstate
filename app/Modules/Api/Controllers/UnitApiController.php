<?php

namespace App\Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Unit;
use App\Modules\Api\Resources\UnitResource;
use App\Modules\Api\Services\UnitApiService;
use Illuminate\Http\Request;

class UnitApiController extends Controller
{
    protected $service;

    public function __construct(UnitApiService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $payload = $this->service->index($request);

        return response()->json([
            'success' => true,
            'data' => UnitResource::collection($payload['items']),
            'meta' => $payload['meta'],
        ]);
    }

    public function show(Unit $unit)
    {
        $unit = $this->service->show($unit);

        return response()->json([
            'success' => true,
            'data' => new UnitResource($unit),
        ]);
    }
}
