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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('service_id')->constrained('services');
            $table->foreignId('employee_id')->constrained('employees');
            $table->float('weight');
            $table->decimal('total_amount', 8, 2);
            $table->enum('payment_status', ['Paid', 'Unpaid'])->default('Unpaid');  //  <----  Corrected
            $table->enum('laundry_status', ['Washing', 'Drying', 'Ready for Pickup', 'Completed'])->default('Washing'); // Added laundry_status here too
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
