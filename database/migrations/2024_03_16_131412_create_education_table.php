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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('isactive')->default('Y');
            $table->unsignedBigInteger('createdby');
            $table->unsignedBigInteger('updatedby');
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
        Schema::dropIfExists('education');
    }
};
