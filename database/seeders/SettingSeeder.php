<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::insert([
            [
                'key' => 'site_title',
                'value' => 'Less4Retail',
            ],
            [
                'key' => 'meta_keyword',
                'value' => 'Less4Retail',

            ],
            [
                'key' => 'meta_title',
                'value' => 'Less4Retail',

            ],
            [
                'key' => 'category_name',
                'value' => 'Non-Category',
            ],
            [
                'key' => 'meta_description',
                'value' => 'Less4Retail',
            ],
            [
                'key' => 'newsletter_text',
                'value' => 'Subscribe to our weekly Newsletter and receive latest discounts and coupons.',
            ],
            [
                'key' => 'footer_description',
                'value' => "For cost-conscious shoppers, Less4Retail.com is the ultimate solution, whether you're shopping online or at your preferred in-store outlets. Access promo codes, discount coupons, free shipping options, cashback deals, and the latest promotions, all while benefiting from our price comparison feature for the best value.",
            ],
            [
                'key' => 'copy_right',
                'value' => 'All Rights Reserved @ Voltranex LLc Design & Developed By.',
            ],

            [
                'key' => 'phone',
                'value' => '+12233445566',
            ],
            [
                'key' => 'email',
                'value' => 'info@Less4Retail.com',
            ],

            [
                'key' => 'address',
                'value' => 'Shah Kabir Mazar Road, Dhaka, Bangladesh',
            ],
            [
                'key' => 'twitter',
                'value' => '#',
            ],
            [
                'key' => 'linkedin',
                'value' => '#',
            ],
            [
                'key' => 'instagram',
                'value' => '#',
            ],
            [
                'key' => 'facebook',
                'value' => '#',
            ],
            [
                'key' => 'paypal_baseUri',
                'value' => 'https://api-m.sandbox.paypal.com',
            ],
            [
                'key' => 'paypal_client_id',
                'value' => 'AVzwOAx1CliTaJDwOngWoyOQL11Xci14KgNucWzJCmOZRuHgwyg_K6uPKD_6ewHSmx8UKSInXGppU0Cv',
            ],
            [
                'key' => 'paypal_client_secret',
                'value' => 'EG2HFyjl_3BsAOgA9T_pLV9v4sb6Ks8ugxNuUBf5p7Js1IOriEAQWt0vTtkZNUYF_sl9O_6MxqiKrPvg',
            ],
            [
                'key' => 'stripe_client_id',
                'value' => 'pk_test_51MbKmSF9RVAIqqiMwsDlsUYtTSsdvwsd9seo2DAjl3WnJ2c5S6kJgS8b3AVnymaBe5uYi8We7qijkhMsHp0gpJaK00b2ukSbOf',
            ],
            [
                'key' => 'stripe_client_secret',
                'value' => 'sk_test_51MbKmSF9RVAIqqiM2YOF2bQXXyMVASxOgdxPNGQgxyFTYfZrWhSyARHgJmdjBzOgT5epWD3eTY9ssmZsK2OsO6Ec00n8TO0SiX',
            ],
            [
                'key' => 'coupon_api_key',
                'value' => 'a6e103f05a83b254a3b7ceaff7d83e84',
            ],
        ]);
    }
}
