<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public const ID = 'id';
    public const TITLE = 'title';
    public const PRICE = 'price';
    public const DURATION = 'duration';

    protected $fillable = [
        self::TITLE,
        self::PRICE,
        self::DURATION,
    ];
}
