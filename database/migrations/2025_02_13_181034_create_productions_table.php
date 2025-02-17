<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable;
            $table->string('shift')->nullable;
            $table->string('number_of_workers')->nullable;
            $table->string('process')->nullable;
            $table->string('number_of_bags_produced')->nullable;
            $table->string('weight_produced')->nullable;
            $table->string('machine_used')->nullable;
            $table->string('material_used')->nullable;
            $table->string('number_of_bags_of_raw_material_used')->nullable;
            $table->string('weight_of_raw_materials_used')->nullable;
            $table->string('utilizing_machine')->nullable;
            $table->string('information')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productions');
    }
};
