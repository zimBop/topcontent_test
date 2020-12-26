<?php

namespace App\Http\Resources;

use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceResource extends JsonResource
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
            Service::ID => $this->id,
            Service::TITLE => $this->title,
            Service::PRICE => $this->price,
            Service::DURATION => $this->duration,
        ];
    }
}
