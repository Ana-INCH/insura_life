<?php

// database/migrations/xxxx_xx_xx_create_payments_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('customers')->onDelete('cascade'); // Relación con Clients
            $table->foreignId('contract_id')->constrained('contracts')->onDelete('cascade'); // Relación con Contracts
            $table->decimal('amount', 10, 2); // Amount of the payment
            $table->string('payment_method'); // Payment method (e.g., Cash, Transfer)
            $table->string('reference')->nullable(); // Payment reference
            $table->string('status'); // Payment status (e.g., Pending, Paid)
            $table->string('receipt')->nullable(); // Payment receipt
            $table->date('payment_date'); // Payment date
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
