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
        Schema::create('drugs', function (Blueprint $table) {
            $table->id('drug_id');
            $table->string('drug_name', 100);
            $table->text('contents');
            $table->text('indications');
            $table->text('dosage');
            $table->text('contraindication');
            $table->text('special_precautions');
            $table->text('drug_interaction');
            $table->text('adverse_reactions');
            $table->text('atc_classification');

            $table->unsignedBigInteger('presentation_id');
            $table->foreign('presentation_id')->references('presentation_id')->on('drug_presentations')->onDelete('cascade');

            $table->unsignedBigInteger('class_id');
            $table->foreign('class_id')->references('class_id')->on('drug_classes')->onDelete('cascade');

            $table->unsignedBigInteger('regulatory_id');
            $table->foreign('regulatory_id')->references('regulatory_id')->on('drug_regulatories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drugs');
    }
};
