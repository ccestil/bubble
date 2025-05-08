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
        Schema::table('transactions', function (Blueprint $table) {
            $table->enum('laundry_status', ['Washing', 'Drying', 'Ready for Pickup', 'Completed'])
                ->default('Washing'); // Set a default value
            $table->enum('payment_status', ['Paid', 'Unpaid'])
                ->default('Unpaid'); // Set a default value
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('laundry_status');
            $table->dropColumn('payment_status');
        });
    }
};