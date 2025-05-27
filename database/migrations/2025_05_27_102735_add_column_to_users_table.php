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
            $table->string('custom_id')->nullable()->after('id');
            $table->string('role_name')->nullable()->after('email');
            $table->string('dial_code')->nullable()->after('role_name');
            $table->string('phone')->nullable()->after('dial_code');
            $table->string('img')->nullable()->after('phone');
            $table->text('address_line_1')->nullable()->after('img');
            $table->text('address_line_2')->nullable()->after('address_line_1');
            $table->string('country')->nullable()->after('address_line_2');
            $table->string('state')->nullable()->after('country');
            $table->string('city')->nullable()->after('state');
            $table->string('pin_code')->nullable()->after('city');
            $table->string('otp')->nullable()->after('pin_code');
            $table->string('status')->nullable()->after('otp');
            $table->unique('phone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
                $table->dropColumn([
                'custom_id',
                'dial_code',
                'phone',
                'address',
                'country',
                'state',
                'city',
                'pin_code',
                'role_name',
                'otp',
                'status',
            ]);
        });
    }
};
