<?php

namespace App\Http\Controllers\Api\Artisan;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtisanResource;
use App\Models\Artisan;
use Illuminate\Http\Request;

class GetArtisanListController extends Controller
{
    public function __invoke(Request $request)
    {
        return ArtisanResource::collection(
            Artisan::all()
        );
    }
}
