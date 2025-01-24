<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained()->cascadeOnDelete();
            $table->string('delivery_street_address');
            $table->string('delivery_postal_code');
            $table->string('delivery_city');
            $table->string('delivery_province');
            $table->date('delivery_date');
            $table->time('delivery_time');
            $table->decimal('total_amount', 8, 2);
            $table->string('payment_method')->default('efectivo');
            $table->string('payment_status')->default('pendiente');
            $table->string('order_status')->default('pendiente');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
}; 