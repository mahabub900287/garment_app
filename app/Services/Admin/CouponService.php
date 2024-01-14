<?php

namespace App\Services\Admin;

use App\Models\CategoryStore;
use App\Models\Coupon;
use App\Models\CouponCategoriable;
use App\Models\CouponCategory;
use App\Models\CouponStore;
use App\Models\FatchData;
use App\Models\Store;
use App\Services\BaseService;
use App\Services\Utilities\FileUploadService;
use Carbon\Carbon;

class CouponService extends BaseService
{
    protected $model;

    protected $fileUploadService;

    public function __construct(FileUploadService $fileUploadService)
    {
        $this->fileUploadService = $fileUploadService;
        $this->model = Coupon::class;
    }

    public function storeOrUpdate($data, $id = null)
    {
        try {
            // Extract the first category from the comma-separated list
            $categories = explode(',', $data['categories']);
            $firstCategory = trim($categories[0]);
            $stores = explode('.', $data['store']);
            $store_name = trim($stores[0]);
            if (!empty($store_name)) {
                $store = Store::firstOrCreate([
                    'name' => $store_name,
                ]);
            }
            // Check if the first category is not empty
            if (!empty($firstCategory)) {
                // Find or create the category in the "categories" table
                $category = CouponCategory::firstOrCreate([
                    'name' => $firstCategory,
                    'status' => 'active',
                ]);
                $data = $this->couponStore($data);
                $coupon = Coupon::where('offer_id', $data['offer_id'])->first();
                $id = $coupon->id ?? Null;
                $value = parent::storeOrUpdate($data, $id);

                if (!is_null($value->id)) {

                    $coupon_id = $value->id;
                    //categoryablie tables store 
                    $coupon = new CouponCategoriable();
                    $coupon->category_id =  $category->id;
                    $coupon->coupon_id =  $coupon_id;
                    $coupon->save();

                    //categorystore tables store 
                    $categorystore = new CategoryStore();
                    $categorystore->category_id =  $category->id;
                    $categorystore->store_id =  $store->id;
                    $categorystore->save();

                    //couponstore tables store 
                    $couponstore = new CouponStore();
                    $couponstore->coupon_id = $coupon_id;;
                    $couponstore->store_id  =  $store->id;
                    $couponstore->save();
                }
            } else {
                $data = $this->couponStore($data);

                $coupon = Coupon::where('offer_id', $data['offer_id'])->first();
                $id = $coupon->id ?? Null;
                $value = parent::storeOrUpdate($data, $id);

                //couponstore tables store 
                $couponstore = new CouponStore();
                $couponstore->coupon_id = $value->id;
                $couponstore->store_id  =  $store->id;
                $couponstore->save();
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
            $this->logFlashThrow($e);
        }
    }

    public function couponStore($data)
    {
        $data = [
            "offer_id" =>  $data['offer_id'],
            "title" => $data['title'],
            "description" => $data['description'],
            "label" => $data['label'],
            "code" => $data['code'],
            "featured" => $data['featured'],
            "source" => $data['source'],
            "deeplink" => $data['deeplink'],
            "affiliate_link" => $data['affiliate_link'],
            "cashback_link" => $data['cashback_link'],
            "url" => $data['url'],
            "image_url" => $data['image_url'],
            "brand_logo" => $data['brand_logo'],
            "type" => $data['type'],
            "store" => $data['store'],
            "merchant_home_page" => $data['merchant_home_page'],
            "start_date" => $data['start_date'],
            "end_date" => $data['end_date'],
            "status" => 'active',
            "primary_location" => $data['primary_location'],
            "language" => $data['language'],
            "rating" => $data['rating'],
            'time'   => Carbon::now(),
        ];
        return $data;
    }
}
