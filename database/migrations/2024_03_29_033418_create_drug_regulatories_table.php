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
        Schema::create('drug_regulatories', function (Blueprint $table) {
            $table->id('regulatory_id');
            $table->string('regulatory_name', 50)->unique();
            $table->text('regulatory_desc');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drug_regulatories');
    }
};
