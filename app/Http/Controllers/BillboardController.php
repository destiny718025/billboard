<?php

namespace App\Http\Controllers;

use App\Http\Resources\GetBillboardListResource;
use Illuminate\Http\Request;

class BillboardController extends Controller
{
    public function index()
    {
        return new GetBillboardListResource($data);
    }

    public function store()
    {

    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
