<?php

namespace App\Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hood;
use App\Modules\Api\Resources\HoodResource;
use App\Modules\Api\Services\HoodApiService;
use Illuminate\Http\Request;

class HoodApiController extends Controller
{
    protected $service;

    public function __construct(HoodApiService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $items = $this->service->index($request);

        return response()->json([
            'success' => true,
            'data' => HoodResource::collection($items),
            'meta' => [
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'per_page' => $items->perPage(),
                'total' => $items->total(),
                'count' => $items->count(),
            ],
        ]);
    }

    public function show(Hood $hood)
    {
        return response()->json([
            'success' => true,
            'data' => new HoodResource($this->service->show($hood)),
        ]);
    }
}
