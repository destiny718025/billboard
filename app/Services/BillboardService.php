<?php


namespace App\Services;


use App\Repositories\BillboardRepository;

class BillboardService
{
    private $billboardRepo;

    public function __construct(
        BillboardRepository $billboardRepo
    ) {
        $this->billboardRepo = $billboardRepo;
    }

    public function getBillboardList()
    {
        return $this->billboardRepo->getList();
    }

    public function getBillboardById(int $id)
    {
        return $this->billboardRepo->firstByFilter([
            'id' => $id
        ]);
    }

    public function createBillboard(array $payload)
    {
        $this->billboardRepo->create([
            'title' => $payload['title'],
            'body' => $payload['body'],
            'published' => empty($payload['published']) ? 0 : 1
        ]);
    }

    public function updateBillboardById(int $id, array $payload)
    {
        $this->billboardRepo->update([
            'id' => $id
        ], [
            'title' => $payload['title'],
            'body' => $payload['body'],
            'published' => empty($payload['published']) ? 0 : 1
        ]);
    }

    public function deleteBillboardById(int $id)
    {
        $this->billboardRepo->delete([
            'id' => $id
        ]);
    }
}