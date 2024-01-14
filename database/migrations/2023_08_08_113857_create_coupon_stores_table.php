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
        Schema::create('coupon_stores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coupon_id')->nullable()->constrained('coupons', 'id')->onDelete('cascade');
            $table->foreignId('store_id')->nullable()->constrained('stores', 'id')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_stores');
    }
};
