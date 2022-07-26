<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\BaseApiRequest;
use App\Http\Requests\CreateBillboardRequest;
use App\Http\Requests\UpdateBillboardRequest;
use App\Http\Resources\BaseResource;
use App\Http\Resources\GetBillboardListResource;
use App\Services\BillboardService;
use App\Http\Controllers\Controller;

class BillboardController extends Controller
{
    private $billboardService;

    public function __construct(
        BillboardService $billboardService
    ) {
        $this->billboardService = $billboardService;
    }

    public function index()
    {
        $data = $this->billboardService->getBillboardList();

        return new GetBillboardListResource($data);
    }

    public function store(CreateBillboardRequest $request)
    {
        $payload = $request->all();

        $this->billboardService->createBillboard($payload);

        return new BaseResource([]);
    }

    public function show(int $id)
    {
        $data = $this->billboardService->getBillboardById($id);

        return new GetBillboardListResource($data);
    }

    public function update(int $id, UpdateBillboardRequest $request)
    {
        $payload = $request->all();

        $this->billboardService->updateBillboardById($id, $payload);

        return new BaseResource([]);
    }

    public function destroy(int $id)
    {
        $this->billboardService->deleteBillboardById($id);

        return new BaseResource([]);
    }
}
