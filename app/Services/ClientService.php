<?php

namespace App\Services;

use App\Models\Client;

class ClientService
{
    public static function getClientByRequestData(array $data): Client
    {
        return Client::firstOrCreate(
            [Client::PHONE => $data[Client::PHONE]],
            $data
        );
    }
}
