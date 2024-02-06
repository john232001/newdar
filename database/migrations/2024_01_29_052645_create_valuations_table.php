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
        Schema::create('valuations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('landholding_id');
            $table->string('lotNumber_id');
            $table->integer('aocNo');
            $table->string('claimNo');
            $table->string('amount');
            $table->string('dateTransmitted')->nullable();
            $table->string('dateofMov')->nullable();
            $table->string('dateServed')->nullable();
            $table->string('dateofFI')->nullable();
            $table->string('dateofCF')->nullable();
            $table->string('transmittalStatus')->nullable();
            $table->string('stateReason')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('valuations');
    }
};
