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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('nights_number');
            $table->string('total_price');
            $table->string('price_per_night');
            $table->string('available_date');
            $table->string('type_of_room');
            $table->boolean('is_reserved');
            $table->string('room_number');
            $table->unsignedBigInteger('detailed_info_id');

            $table->foreign('detailed_info_id')->references('id')->on('detailed_infos')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
