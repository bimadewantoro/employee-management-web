<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'employee_id',
        'name',
        'birth_place',
        'birth_date',
        'address',
        'gender',
        'group',
        'echelon',
        'position',
        'place_of_duty',
        'religion',
        'work_unit',
        'phone_number',
        'npwp',
    ];
}
