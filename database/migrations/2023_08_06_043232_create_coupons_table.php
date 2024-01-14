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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('offer_id')->unique();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('label')->nullable();
            $table->string('code')->nullable();
            $table->string('featured')->nullable();
            $table->string('source')->nullable();
            $table->string('deeplink')->nullable();
            $table->string('affiliate_link')->nullable();
            $table->string('cashback_link')->nullable();
            $table->string('url')->nullable();
            $table->string('image_url')->nullable();
            $table->string('brand_logo')->nullable();
            $table->string('type')->nullable();
            $table->string('store')->nullable();
            $table->string('merchant_home_page')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->string('status', 50)->nullable();
            $table->string('primary_location')->nullable();
            $table->string('language')->nullable();
            $table->string('rating')->nullable();
            $table->timestamp('time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
