<?php

namespace App\Services;

use App\Exceptions\ArtisanIsNotAvailableException;
use App\Models\Appointment;
use App\Models\Artisan;
use App\Models\Client;
use App\Models\Service;
use App\Models\Timeslot;
use App\Models\WorkDay;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AppointmentService
{
    protected Artisan $artisan;
    protected string $startDate;
    protected string $startTime;
    protected string $endTime;

    public function setArtisan(int $artisanId): self
    {
        $this->artisan = Artisan::find($artisanId);

        return $this;
    }

    public function setDateTimes(array &$data): void
    {
        $this->startDate = $data['date'];

        $start = Carbon::createFromFormat('H:i', $data['time']);
        $this->startTime = $start->format('H:i:s');
        $data[Appointment::START] = $this->startTime;

        $service = Service::find($data[Appointment::SERVICE_ID]);
        $this->endTime = $start->addMinutes($service->duration)->format('H:i:s');
        $data[Appointment::END] = $this->endTime;
    }

    public function create(Client $client, array $data)
    {
        $this->setDateTimes($data);

        if ($this->isWorkDayDoesntExist() || $this->isAppointmentOverlapsWithExisting()) {
            throw new ArtisanIsNotAvailableException(422, 'Artisan is not available at this date and time');
        }

        return $client->appointments()->create($data);
    }

    public function getAvailableTimeslots(string $date, int $serviceId): array
    {
        $duration = Service::find($serviceId)->duration;

        return Timeslot::whereRaw("timeslots.start + INTERVAL $duration MINUTE <= '18:00:00'")
            ->whereNotExists(function ($query) use ($date, $duration) {
                $query->select(DB::raw(1))
                    ->from('appointments')
                    ->whereRaw("appointments.date = ?", [$date])
                    ->whereRaw("appointments.artisan_id = {$this->artisan->id}")
                    ->whereRaw('appointments.end > timeslots.start')
                    ->whereRaw("timeslots.start + INTERVAL $duration MINUTE > appointments.start");
            })
            ->orderBy('start')
            ->get(['start'])
            ->pluck(['start'])
            ->toArray();
    }

    public function getNearestAvailableDates(int $serviceId): array
    {
        $duration = Service::find($serviceId)->duration;

        return $this->artisan
            ->work_days()
            ->where(WorkDay::DATE, '>=', now()->format('Y-m-d'))
            ->whereExists(function ($query) use ($duration) {
                $query->select(DB::raw(1))
                    ->from('timeslots')
                    ->whereRaw("timeslots.start + INTERVAL $duration MINUTE <= '18:00:00'")
                    ->whereNotExists(function ($query) use ($duration) {
                        $query->select(DB::raw(1))
                            ->from('appointments')
                            ->whereRaw("appointments.date = work_days.date")
                            ->whereRaw("appointments.artisan_id = {$this->artisan->id}")
                            ->whereRaw('appointments.end > timeslots.start')
                            ->whereRaw("timeslots.start + INTERVAL $duration MINUTE > appointments.start");
                    });
            })
            ->limit(7)
            ->orderBy('date')
            ->get(['date'])
            ->pluck('date')
            ->toArray();
    }

    protected function isWorkDayDoesntExist(): bool
    {
        return $this->artisan->work_days()
            ->whereDate(WorkDay::DATE, $this->startDate)
            ->doesntExist();
    }

    protected function isAppointmentOverlapsWithExisting(): bool
    {
        return $this->artisan->appointments()->whereDate(Appointment::DATE, $this->startDate)
            ->where(Appointment::END, '>', $this->startTime)
            ->where(Appointment::START, '<', $this->endTime)
            ->exists();
    }
}
