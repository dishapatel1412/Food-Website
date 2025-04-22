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
        Schema::create('vendors', function (Blueprint $table) {
            $table->id('vendor_id');
            $table->string('owner_name');
            $table->string('restaurant_name');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('password');
            $table->string('state');
            $table->string('city');
            $table->string('gst_number');
            $table->enum('is_approved',['pending','approved','rejected']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendors');
    }
};
