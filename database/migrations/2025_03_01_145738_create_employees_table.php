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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->string('address');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('group');
            $table->string('echelon');
            $table->string('position');
            $table->string('place_of_duty');
            $table->string('religion');
            $table->string('work_unit');
            $table->string('phone_number');
            $table->string('npwp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
