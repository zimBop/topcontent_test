<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timeslot extends Model
{
    public $timestamps = false;

    public const ID = 'id';
    public const START = 'start';

    protected $fillable = [
        self::START,
    ];
}
