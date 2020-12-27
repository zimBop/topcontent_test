<?php

namespace App\Http\Controllers\Api\Appointment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostCreateAppointmentRequest;
use App\Services\AppointmentService;
use App\Services\ClientService;

class PostCreateAppointmentController extends Controller
{
    public function __invoke(PostCreateAppointmentRequest $request, AppointmentService $appointmentService)
    {
        $client = ClientService::getClientByRequestData($request->input('client'));

        $appointmentService->setArtisan($request->input('artisan_id'))
            ->create($client, $request->except(['client']));

        return response()->json([
            'message' => 'Appointment created',
        ]);
    }
}
