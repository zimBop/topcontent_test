<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    public const ID = 'id';
    public const DATE = 'date';

    protected $fillable = [
        self::DATE,
    ];
}
