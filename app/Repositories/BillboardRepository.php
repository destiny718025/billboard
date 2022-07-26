<?php


namespace App\Repositories;


use App\Models\Billboard;

class BillboardRepository
{
    private $billboard;

    public function __construct(
        Billboard $billboard
    ) {
        $this->billboard = $billboard;
    }

    public function getList()
    {
        return $this->billboard
            ->get();
    }

    public function firstByFilter(array $filter)
    {
        return $this->billboard
            ->where($filter)
            ->first();
    }

    public function create(array $payload)
    {
        return $this->billboard
            ->create($payload);
    }

    public function update(array $filter, array $payload)
    {
        return $this->billboard
            ->where($filter)
            ->update($payload);
    }

    public function delete(array $filter)
    {
        return $this->billboard
            ->where($filter)
            ->delete();
    }
}