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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->nullable();
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('marital_status', ['married', 'single'])->nullable();
            $table->string('phone');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('country');
            $table->string('postal_code');
            $table->string('license_no');
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->text('extra')->nullable(); //for bio,lang,year_of_exper,degree,national_id
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('doctor_consultation_fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->enum('type', ['audio', 'video', 'physical', 'chat']);
            $table->integer('duration_minutes')->nullable(); // e.g., 30
            $table->decimal('price', 8, 2)->nullable(); // e.g., 49.99
            $table->timestamps();

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_consultation_fees');
        Schema::dropIfExists('doctors');
    }
};
