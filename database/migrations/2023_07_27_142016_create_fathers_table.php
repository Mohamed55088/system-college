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
        Schema::create('fathers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('national_Id_Father');
            $table->bigInteger('passport_Id_Father');
            $table->string('name_Father');
            $table->string('address_Father');
            $table->string('job_Father');
            $table->string('phone_Father');
            $table->foreignId('nationalities_Father_id')->references('id')->on('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('religions_Father_id')->references('id')->on('religions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type_Bloods_Father_id')->references('id')->on('type__bloods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fathers');
    }
};