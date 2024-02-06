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
        Schema::create('arbs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('landholding_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('mname')->nullable();
            $table->string('extension')->nullable();
            $table->string('spousename')->nullable();
            $table->string('datebirth');
            $table->bigInteger('gender_id');
            $table->string('address');
            $table->bigInteger('ownership_id');
            $table->string('dateOfOath');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arbs');
    }
};
