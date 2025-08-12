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
            $table->string('phone')->unique()->nullable();
            $table->string('business_name')->nullable();
            $table->string('business_type')->nullable();
            $table->string('subscription_type')->default('free');
            $table->timestamp('phone_verified_at')->nullable();
            $table->string('verification_code')->nullable();
            $table->timestamp('verification_code_expires_at')->nullable();

            // حذف فیلدهای غیرضروری
            $table->dropColumn('email_verified_at');
            $table->string('email')->nullable()->change();
            $table->string('password')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
