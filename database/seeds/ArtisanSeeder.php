<?php

use Illuminate\Database\Seeder;
use App\Models\Artisan;
use App\Models\WorkDay;

class ArtisanSeeder extends Seeder
{
    protected $workDays;

    public function __construct()
    {
        $this->workDays = WorkDay::where(WorkDay::DATE, '>=', now()
            ->format('Y-m-d'))->get();
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Artisan::class, 20)->create()
            ->each(fn($artisan) => $this->createSchedule($artisan));
    }

    protected function createSchedule(Artisan $artisan)
    {
        $this->workDays->each(function ($workDay) use ($artisan) {
            if ($this->isNotWorkingDay()) {
                return;
            }

            $artisan->work_days()->attach($workDay->id);
        });
    }

    /**
     * 30% chance the day is not working
     * 70% chance the day is working
     */
    protected function isNotWorkingDay()
    {
        return rand(1, 100) > 70;
    }
}
