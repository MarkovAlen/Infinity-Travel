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
        Schema::create('airplane_tickets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone_number');
            $table->string('class');
            $table->string('origin');
            $table->string('destination');
            $table->string('date_of_going');
            $table->string('return_date');
            $table->integer('adults_number');
            $table->integer('kids_number');
            
            $table->integer('babies_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('airplane_tickets');
    }
};
