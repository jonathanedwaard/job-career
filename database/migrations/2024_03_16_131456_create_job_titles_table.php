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
        Schema::create('job_titles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('jobspecialization');
            $table->string('isactive')->default('Y');
            $table->unsignedBigInteger('createdby');
            $table->unsignedBigInteger('updatedby');
            $table->foreign('createdby')->references('id')->on('users');
            $table->foreign('updatedby')->references('id')->on('users');
            $table->foreign('jobspecialization')->references('id')->on('job_specializations');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_titles');
    }
};
