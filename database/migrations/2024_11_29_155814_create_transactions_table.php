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
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('sale_history_id')->constrained()->onDelete('cascade');
            $table->string('order_id');
            $table->string('payment_type');
            $table->integer('gross_amount');
            $table->string('payment_status')->default('pending');
            $table->string('transaction_id')->nullable();
            $table->string('status_code')->nullable();
            $table->string('status_message')->nullable();
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
