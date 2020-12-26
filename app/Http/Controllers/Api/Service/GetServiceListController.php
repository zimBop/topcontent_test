<?php

namespace App\Http\Controllers\Api\Service;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Http\Request;

class GetServiceListController extends Controller
{
    public function __invoke(Request $request)
    {
        return ServiceResource::collection(
            Service::all()
        );
    }
}
