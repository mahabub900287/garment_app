<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
     protected $fillable = [
        "offer_id",
        "title",
        "description",
        "label",
        "code",
        "featured",
        "source",
        "deeplink",
        "affiliate_link",
        "cashback_link",
        "url",
        "image_url",
        "brand_logo",
        "type",
        "store",
        "merchant_home_page",
        "categories",
        "start_date",
        "end_date",
        "status",
        "primary_location",
        "language",
        "rating",
        "time"
     ];
}
