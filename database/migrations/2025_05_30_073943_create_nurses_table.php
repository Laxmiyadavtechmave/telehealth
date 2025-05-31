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
        Schema::create('nurses', function (Blueprint $table) {
            $table->id();
            $table->string('nurse_id');
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->unsignedBigInteger('role_id')->nullable();
            $table->string('name');
            $table->date('dob')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->enum('marital_status',['Married', 'Unmarried', 'Single'])->nullable();
            $table->string('license_no')->nullable();
            $table->integer('year_of_experience')->nullable();
            $table->string('language')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->string('national_id')->nullable();
            $table->string('qualification')->nullable();
            $table->string('phone')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('postal_code')->nullable();
            $table->text('extra')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->softDeletes();
            $table->timestamps();

            // Optional foreign keys (add if you have referenced tables)
            // $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('set null');
            // $table->foreign('nurse_id')->references('id')->on('nurses')->onDelete('set null');
            // $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null');
            // $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });


        Schema::create('nurse_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nurse_id');
            $table->foreign('nurse_id')->references('id')->on('clinics')->onDelete('cascade');
            $table->string('img');
            $table->timestamps();
        });

        Schema::create('nurse_expertises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nurse_id')->nullable();
            $table->unsignedBigInteger('area_of_expertise_id')->nullable();
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nurses');
        Schema::dropIfExists('nurse_images');
        Schema::dropIfExists('nurse_expertises');
    }
};
