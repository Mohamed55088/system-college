<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teachers_sections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained()->references('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('teachers_id')->constrained()->references('id')->on('teachers')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers_sections');
    }
};