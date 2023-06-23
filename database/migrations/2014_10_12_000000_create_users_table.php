<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->null;
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('phone');
            $table->text('image')->nullable();
            $table->foreignId('role_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
=======
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('phone');
            $table->string('avatar')->nullable();
            $table->string('role')->nullable();
>>>>>>> aa3445f (projects done)
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
<<<<<<< HEAD
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
=======
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
>>>>>>> aa3445f (projects done)
