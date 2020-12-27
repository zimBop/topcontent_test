<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artisan extends Model
{
    public const ID = 'id';
    public const NAME = 'name';

    protected $fillable = [
        self::NAME,
    ];

    public function work_days()
    {
        return $this->belongsToMany(WorkDay::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
