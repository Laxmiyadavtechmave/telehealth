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
        Schema::table('clinics', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_id')->nullable()->after('clinic_id');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->string('title')->nullable()->after('img'); // corrected from unsignedBigInteger to string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clinics', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });


        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('title');
        });
    }
};
