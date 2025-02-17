<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    /** @use HasFactory<\Database\Factories\ProductionFactory> */
    use HasFactory;


    protected $fillable = [
        'date', 
        'shift',  
        'number_of_workers',
        'process',
        'number_of_bags_produced',
        'weight_produced',
        'machine_used',
        'material_used',
        'number_of_bags_of_raw_material_used',
        'weight_of_raw_materials_used',
        'utilizing_machine',
        'information',

    ];
}
