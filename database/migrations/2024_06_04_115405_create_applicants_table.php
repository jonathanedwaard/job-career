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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->integer('salary');
            $table->string('phone');
            $table->string('gender');
            $table->string('linkedin');
            $table->string('cv');
            $table->string('isaccepted');
            $table->unsignedBigInteger('user');
            $table->unsignedBigInteger('jobrequest');
            $table->unsignedBigInteger('education');
            $table->unsignedBigInteger('workexperience');
            $table->foreign('user')->references('id')->on('users');
            $table->foreign('jobrequest')->references('id')->on('job_requests');
            $table->foreign('education')->references('id')->on('education');
            $table->foreign('workexperience')->references('id')->on('work_experiences');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
