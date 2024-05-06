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
        Schema::create('mothers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('national_Id_Mother');
            $table->bigInteger('passport_Id_Mother');
            $table->string('name_Mother');
            $table->string('job_Mother');
            $table->string('address_Mother');
            $table->string('phone_mother');
            $table->foreignId('nationalities_Mother_id')->references('id')->on('nationalities')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('religions_Mother_id')->references('id')->on('religions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type_Bloods_Mother_id')->references('id')->on('type__bloods')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mothers');
    }
};