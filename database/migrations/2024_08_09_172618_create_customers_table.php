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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('business_name')->unique();
            $table->string('email')->unique();
            $table->string('account_number');
            $table->string('title');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile');
            $table->string('phone');
            $table->string('website');
            $table->string('billing_address');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->string('country');
            $table->unsignedBigInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
