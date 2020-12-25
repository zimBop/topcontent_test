<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class WorkDay extends Model
{
    public const ID = 'id';
    public const DATE = 'date';
    public const START = 'start';
    public const END = 'end';

    protected $fillable = [
        self::DATE,
        self::START,
        self::END,
    ];

    public function getStartFormattedAttribute()
    {
        return Carbon::createFromFormat('H:i:s', $this->start)->format('H:i');
    }

    public function getEndFormattedAttribute()
    {
        return Carbon::createFromFormat('H:i:s', $this->end)->format('H:i');
    }
}
