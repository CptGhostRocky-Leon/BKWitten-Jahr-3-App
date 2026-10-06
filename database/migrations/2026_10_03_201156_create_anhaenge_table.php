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
        Schema::create('anhaenge', function (Blueprint $table) {
            $table->id();
            $table->foreignId('information_id')->constrained('information')->cascadeOnDelete();
            $table->string('dateiname');
            $table->string('dateipfad');
            $table->string('dateityp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anhaenge');
    }
};
