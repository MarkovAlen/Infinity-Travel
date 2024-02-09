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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('image_path_1');
            $table->string('image_path_2');
            $table->string('image_path_3');
            $table->string('image_path_4');
            $table->string('image_path_5');

       

            $table->unsignedBigInteger('detailed_info_id');

            $table->foreign('detailed_info_id')->references('id')->on('detailed_infos')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    
    }
};
