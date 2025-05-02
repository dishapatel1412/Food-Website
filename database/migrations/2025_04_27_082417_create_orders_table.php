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
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('payment_id');
            $table->integer('quantity');
            $table->enum('order_status', ['pending', 'accepted', 'delivered', 'canceled'])->default('pending');
            $table->timestamp('order_date')->nullable();
            $table->decimal('total_amount', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('item_id')->references('item_id')->on('fooditems');
            $table->foreign('vendor_id')->references('vendor_id')->on('vendors');
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->foreign('payment_id')->references('payment_id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
