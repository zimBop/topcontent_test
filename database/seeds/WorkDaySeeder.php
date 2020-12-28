<?php

use Illuminate\Database\Seeder;
use App\Models\WorkDay;

class WorkDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scheduleLastDay = now()->addMonth();
        $scheduleDay = now();

        while ($scheduleDay->lt($scheduleLastDay)) {
            factory(WorkDay::class)->create([
                WorkDay::DATE => $scheduleDay->format('Y-m-d')
            ]);

            $scheduleDay->addDay();
        }
    }
}
