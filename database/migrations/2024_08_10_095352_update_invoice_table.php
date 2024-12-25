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
            $table->unsignedBigInteger('cro_id')->nullable();
            $table->foreign('cro_id')->references('id')->on('cros');
            $table->unsignedBigInteger('joined_id')->nullable();
            $table->foreign('joined_id')->references('id')->on('cros');
            $table->unsignedBigInteger('trainer_id')->nullable();
            $table->foreign('trainer_id')->references('id')->on('cros');
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
