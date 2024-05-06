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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->date('birth-date');
            $table->date('acadmic-year');
            $table->foreignId('sections_id')->constrained()->references('id')->on('sections')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('genders_id')->constrained()->references('id')->on('genders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('grades_id')->constrained()->references('id')->on('grades')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('parents_id')->constrained()->references('id')->on('parents')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('nationalities_id')->constrained()->references('id')->on('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('class_rooms_id')->constrained()->references('id')->on('class_rooms')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('religions_id')->constrained()->references('id')->on('religions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type__bloods_id')->constrained()->references('id')->on('type__bloods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};