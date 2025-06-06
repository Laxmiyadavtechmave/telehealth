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
        Schema::create('pharmacies', function (Blueprint $table) {
            $table->id();
            $table->string('pharmacy_id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('img')->nullable();
            $table->string('password');
            $table->string('license_no');
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();
            $table->string('phone');
            $table->string('pharmacy_type')->nullable();
            $table->unsignedBigInteger('clinic_id')->nullable();
            $table->foreign('clinic_id')->references('id')->on('clinics')->onDelete('cascade');
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('country');
            $table->string('postal_code');
            $table->text('map_link')->nullable();
            $table->text('extra')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacies');
    }
};
