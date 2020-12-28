<?php

namespace App\Http\Controllers\Api\Artisan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetAvailableTimeslotsRequest;
use App\Models\Artisan;
use App\Services\AppointmentService;

class GetAvailableTimeslotsController extends Controller
{
    public function __invoke(
        Artisan $artisan,
        GetAvailableTimeslotsRequest $request,
        AppointmentService $appointmentService
    ) {
        return response()->json(
            $appointmentService->setArtisan($artisan->id)
                ->getAvailableTimeslots(
                    $request->input('date'),
                    (int)$request->input('service_id')
                )
        );
    }
}
