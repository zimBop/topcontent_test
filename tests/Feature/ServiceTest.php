<?php

namespace Tests\Feature;

use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    public function testIsServiceListAvailable(): void
    {
        factory(Service::class, $this->faker->numberBetween(1, 5))->create();

        $this->getJson(route(R_GET_SERVICE_LIST))
            ->assertStatus(200)
            ->assertJson(
                ServiceResource::collection(Service::all())
                    ->toArray(null)
            );
    }
}
