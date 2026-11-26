<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'date_of_birth',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
        ];
    }

    /**
     * Age in years, worked out from date_of_birth (null if no date of birth).
     */
    protected function age(): Attribute
    {
        return Attribute::get(fn () => $this->date_of_birth?->age);
    }
}
