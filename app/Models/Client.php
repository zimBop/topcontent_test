<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public const ID = 'id';
    public const NAME = 'name';
    public const PHONE = 'phone';

    protected $fillable = [
        self::NAME,
        self::PHONE,
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
