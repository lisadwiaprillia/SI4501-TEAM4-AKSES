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
        Schema::create('institutions', function (Blueprint $table) {
            $table->id('institution_id');
            $table->string('institution_name', 100)->unique();
            $table->string('institution_phone', 50)->unique();
            $table->text('institution_address');
            $table->string('institution_chairman', 50);
            $table->string('institution_evidence');
            $table->enum('institution_status', ['Pending', 'Diterima', 'Ditolak']);
            $table->string('institution_ticket_code', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutions');
    }
};
