<?php

namespace App\Http\Resources;

use App\Models\Artisan;
use Illuminate\Http\Resources\Json\JsonResource;

class ArtisanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            Artisan::ID => $this->id,
            Artisan::NAME => $this->name,
        ];
    }
}
