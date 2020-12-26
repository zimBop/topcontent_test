<?php

namespace Tests\Feature;

use App\Http\Resources\ArtisanResource;
use App\Models\Artisan;
use Tests\TestCase;

class ArtisanTest extends TestCase
{
    public function testIsArtisanListAvailable(): void
    {
        factory(Artisan::class, $this->faker->numberBetween(1, 5))->create();

        $this->getJson(route(R_GET_ARTISAN_LIST))
            ->assertStatus(200)
            ->assertJson(
                ArtisanResource::collection(Artisan::all())
                    ->toArray(null)
            );
    }
}
