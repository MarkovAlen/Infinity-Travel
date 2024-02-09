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
        Schema::create('detailed_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('description',500);
            $table->string('transport');


            $table->unsignedBigInteger('accommodation_id');
            $table->foreign('accommodation_id')->references('id')->on('accommodations')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detailed_infos');
    }
};
