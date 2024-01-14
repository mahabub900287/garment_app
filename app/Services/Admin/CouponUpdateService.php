<?php

namespace App\Services\Admin;

use App\Models\Coupon;
use App\Models\CouponCategoriable;
use App\Models\CouponCategory;
use App\Models\FatchData;
use App\Services\BaseService;
use App\Services\Utilities\FileUploadService;
use Carbon\Carbon;

class CouponUpdateService   extends BaseService
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

                    $coupon = new CouponCategoriable();
                    $coupon->category_id =  $category->id;
                    $coupon->coupon_id =  $coupon_id;
                    $coupon->save();
                }
            } else {
                $data = $this->couponStore($data);
                $coupon = Coupon::where('offer_id', $data['offer_id'])->first();
                $id = $coupon->id ?? Null;
                $value = parent::storeOrUpdate($data, $id);
            }
        } catch (\Exception $e) {
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
            "status" => $data['status'],
            "primary_location" => $data['primary_location'],
            "language" => $data['language'],
            "rating" => $data['rating'],
            'time'   => Carbon::now(),
        ];
        return $data;
    }
}
