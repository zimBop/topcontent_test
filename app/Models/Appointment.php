<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public const ID = 'id';
    public const ARTISAN_ID = 'artisan_id';
    public const SERVICE_ID = 'service_id';
    public const CLIENT_ID = 'client_id';
    public const DATE = 'date';
    public const START = 'start';
    public const END = 'end';

    protected $fillable = [
        self::ARTISAN_ID,
        self::SERVICE_ID,
        self::CLIENT_ID,
        self::DATE,
        self::START,
        self::END,
    ];

    public function client()
    {
        $this->belongsTo(Client::class);
    }
}
