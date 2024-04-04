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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_email', 100)->unique();
            $table->string('name', 50)->unique();
            $table->string('user_phone')->unique();
            $table->text('user_address');
            $table->string('user_password');
            $table->timestamps();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('institution_id');
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
            $table->foreign('institution_id')->references('institution_id')->on('institutions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
