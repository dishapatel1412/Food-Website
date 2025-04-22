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
        Schema::create('fooditems', function (Blueprint $table) {
            $table->id('item_id');
            $table->string('image_path');
            $table->string('name');
            $table->string('price');
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('vendor_id')->onDelete('cascade')->on('vendors');
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fooditems', function (Blueprint $table) {
            Schema::dropIfExists('fooditems');
            $table->dropSoftDeletes();
        });
    }
};
