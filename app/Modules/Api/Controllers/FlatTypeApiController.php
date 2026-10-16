<?php

namespace App\Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Flat_type;
use App\Modules\Api\Resources\FlatTypeResource;
use App\Modules\Api\Services\FlatTypeApiService;
use Illuminate\Http\Request;

class FlatTypeApiController extends Controller
{
    protected $service;

    public function __construct(FlatTypeApiService $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $items = $this->service->index($request);

        return response()->json([
            'success' => true,
            'data' => FlatTypeResource::collection($items),
            'meta' => [
                'current_page' => $items->currentPage(),
                'last_page' => $items->lastPage(),
                'per_page' => $items->perPage(),
                'total' => $items->total(),
                'count' => $items->count(),
            ],
        ]);
    }

    public function show(Flat_type $flatType)
    {
        return response()->json([
            'success' => true,
            'data' => new FlatTypeResource($this->service->show($flatType)),
        ]);
    }
}
