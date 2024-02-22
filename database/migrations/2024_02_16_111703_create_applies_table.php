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
        Schema::create('applies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('company_id');
            $table->string('status');
            $table->foreign('job_id')->references('id')->on('jobs')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('profile_id')->references('id')->on('profiles')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreign('company_id')->references('id')->on('companies')->cascadeOnUpdate()->restrictOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applies');
    }
};
