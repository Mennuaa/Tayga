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
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('date');
            $table->integer('days');
            $table->string('subtitle')->nullable();
            $table->text('text');
            $table->integer('price');
            $table->integer('longitude');
            $table->integer('latitude');
            $table->text('place_name');
            $table->text('tour_advantages');
            $table->text('tour_privilages');
            $table->string('stars')->nullable();
            $table->string('placement_stars')->nullable();
            $table->string('service_stars')->nullable();
            $table->string('eating_stars')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
