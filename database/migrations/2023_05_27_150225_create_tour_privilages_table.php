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
        Schema::create('tour_privilages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id');
            $table->string('privilage');
            $table->timestamps();

            $table->foreign('tour_id')
            ->references('id')
            ->on('tours')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_privilages');
    }
};
