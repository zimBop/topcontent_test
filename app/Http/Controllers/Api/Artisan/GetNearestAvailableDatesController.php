<?php

namespace App\Http\Controllers\Api\Artisan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetNearestAvailableDatesRequest;
use App\Models\Artisan;
use App\Services\AppointmentService;

class GetNearestAvailableDatesController extends Controller
{
    public function __invoke(
        Artisan $artisan,
        GetNearestAvailableDatesRequest $request,
        AppointmentService $appointmentService
    ) {
        return response()->json(
            $appointmentService->setArtisan($artisan->id)
                ->getNearestAvailableDates(
                    (int)$request->input('service_id')
                )
        );
    }
}
