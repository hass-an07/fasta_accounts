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
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('customer_name')->after('customer_id');
            $table->string('customer_cnic')->after('customer_name');
            $table->string('customer_email')->after('customer_cnic');
            $table->string('customer_phone')->after('customer_email');
            $table->unsignedBigInteger('office_managment_id')->nullable();
            $table->foreign('office_managment_id')->references('id')->on('cros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
};
