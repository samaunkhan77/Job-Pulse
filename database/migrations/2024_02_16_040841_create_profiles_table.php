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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('user_address');
            $table->string('user_image');
            $table->string('user_father_name');
            $table->string('user_mother_name');
            $table->string('user_gender');
            $table->string('user_dob');
            $table->string('user_nid');
            $table->string('user_passport')->nullable();
            $table->string('user_nationality');
            $table->string('user_facebook');
            $table->string('user_github');
            $table->string('user_linkedin');
            $table->string('user_website');
            $table->string('user_university');
            $table->string('user_degree');
            $table->string('user_passing_year');
            $table->string('user_college');
            $table->string('user_subject');
            $table->string('user_passing_year2');
            $table->string('user_training');
            $table->string('user_passing_year3');
            $table->string('user_job_experience');
            $table->string('user_skill');
            $table->string('user_bio');
            $table->string('user_current_salary');
            $table->string('user_expected_salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
