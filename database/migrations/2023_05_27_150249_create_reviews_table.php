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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id');
            $table->integer('stars');
            $table->unsignedBigInteger('user_id');
            $table->string('date');
            $table->integer('placement_stars')->nullable();
            $table->integer('service_stars')->nullable();
            $table->integer('eat_stars')->nullable();
            $table->longText('revew');
            $table->timestamps();

            $table->foreign('tour_id')
            ->references('id')
            ->on('tours')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
