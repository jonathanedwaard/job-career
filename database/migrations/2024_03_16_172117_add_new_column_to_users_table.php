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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('education')->nullable()->after('dateofbirth');
            $table->unsignedBigInteger('workexperience')->nullable()->after('dateofbirth');
            $table->unsignedBigInteger('jobtitle')->nullable()->after('dateofbirth');
            $table->unsignedBigInteger('jobtype')->nullable()->after('dateofbirth');
            $table->foreign('education')->references('id')->on('education');
            $table->foreign('workexperience')->references('id')->on('work_experiences');
            $table->foreign('jobtitle')->references('id')->on('job_titles');
            $table->foreign('jobtype')->references('id')->on('job_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
