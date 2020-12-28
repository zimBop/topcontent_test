<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Timeslot;

class TimeslotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $timeslot = Carbon::createFromFormat('H:i:s', '09:00:00');
        $lastTimeslot = Carbon::createFromFormat('H:i:s', '17:30:00');
        $timeslotDuration = 30;

        while ($timeslot->lte($lastTimeslot)) {
            Timeslot::create([
                Timeslot::START => $timeslot->format('H:i:s'),
            ]);

            $timeslot->addMinutes($timeslotDuration);
        }
    }
}
