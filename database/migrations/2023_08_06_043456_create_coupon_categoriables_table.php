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
        Schema::create('coupon_categoriables', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('coupon_categories', 'id')->onDelete('set null');
            $table->foreignId('coupon_id')->nullable()->constrained('coupons', 'id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_categoriables');
    }
};
