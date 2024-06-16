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
        Schema::create('job_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jobtitle');
            $table->unsignedBigInteger('jobtype');
            $table->unsignedBigInteger('location');
            $table->unsignedBigInteger('education');
            $table->unsignedBigInteger('workexperience');
            $table->integer('quota');
            $table->integer('salary');
            $table->string('description', 500);
            $table->string('requirement', 500);
            $table->string('isactive')->default('Y');
            $table->unsignedBigInteger('createdby');
            $table->unsignedBigInteger('updatedby');
            $table->foreign('jobtitle')->references('id')->on('job_titles');
            $table->foreign('jobtype')->references('id')->on('job_types');
            $table->foreign('location')->references('id')->on('locations');
            $table->foreign('education')->references('id')->on('education');
            $table->foreign('workexperience')->references('id')->on('work_experiences');
            $table->foreign('createdby')->references('id')->on('users');
            $table->foreign('updatedby')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_requests');
    }
};
