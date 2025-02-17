<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    /** @use HasFactory<\Database\Factories\ProductionFactory> */
    


    protected $fillable = [
        'firstname',
        'lastname',
        'address',
        'employment_date',
        'bank',
        'account_number', 

    ];
}
