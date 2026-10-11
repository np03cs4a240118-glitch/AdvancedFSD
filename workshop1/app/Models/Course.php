<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // These are the fields we are allowed to fill using Course::create() and ->update()
    protected $fillable = [
        'name',
        'description',
        'duration',
        'fee',
        'difficulty',
        'is_active',
    ];

    // Tell Laravel that is_active is true/false (MySQL stores it as 1/0)
    protected $casts = [
        'is_active' => 'boolean',
    ];
}
