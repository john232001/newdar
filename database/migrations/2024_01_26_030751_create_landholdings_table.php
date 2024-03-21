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
        Schema::create('landholdings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lhid');
            $table->string('firstname');
            $table->string('familyname');
            $table->string('middlename')->nullable();
            $table->bigInteger('municipality_id');
            $table->biginteger('barangay_id');
            $table->string('octNo');
            $table->string('lotNo');
            $table->string('surveyNo');
            $table->string('surveyArea');
            $table->string('taxNo')->nullable();
            $table->string('modeOfAcquisition')->nullable();
            $table->string('coverableArea')->nullable();
            $table->string('carpableArea')->nullable();
            $table->string('noncarpableArea')->nullable();
            $table->string('retainedArea')->nullable();
            $table->string('distributeArea')->nullable();
            $table->string('landsize')->nullable();
            $table->string('majorCrops')->nullable();
            $table->string('phase')->nullable();
            $table->string('upals')->nullable();
            $table->string('yearAdded')->nullable();
            $table->string('pipeline')->nullable();
            $table->string('targetyear')->nullable();
            $table->string('projectedDelivery')->nullable();
            $table->bigInteger('paro_id');
            $table->bigInteger('maro_id');
            $table->bigInteger('carpo_id');
            $table->bigInteger('ceo_id');
            $table->bigInteger('manager_id');
            $table->bigInteger('rod_id');
            $table->string('title')->nullable();
            $table->string('taxDocuments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('landholdings');
    }
};
