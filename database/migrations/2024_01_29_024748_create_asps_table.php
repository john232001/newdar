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
        Schema::create('asps', function (Blueprint $table) {
            $table->id();
            $table->string('landholding_id');
            $table->string('aspNo');
            $table->string('aspDate');
            $table->string('aspArea');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asps');
    }
};
