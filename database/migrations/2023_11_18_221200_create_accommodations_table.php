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
        Schema::create('accommodations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('main_image');
            $table->string('additional_information');
            $table->boolean('is_last_minute')->default(false);
            $table->string('name');

            $table->unsignedBigInteger('region_id');
            $table->unsignedBigInteger('rating_id');

            $table->foreign('region_id')->references('id')->on('regions')->constrained()->onDelete('cascade');
            $table->foreign('rating_id')->references('id')->on('ratings')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accommodations');
    }
};
