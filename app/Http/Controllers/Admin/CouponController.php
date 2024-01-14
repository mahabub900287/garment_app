<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Coupon;
use GuzzleHttp\Client;
use App\Models\FatchData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\CouponService;
use App\Services\Admin\CouponUpdateService;

class CouponController extends Controller
{
    protected $couponService;
    protected $couponupdateService;

    public function __construct(CouponService  $couponService, CouponUpdateService  $couponupdateService)
    {
        $this->couponService = $couponService;
        $this->couponupdateService = $couponupdateService;
    }
    /**
     * Display a listing of the resource.
     */
    public function couponStore()
    {
        $client = new Client();
        try {

            $jsonFilePath = public_path('json/data.json');
            $jsonData = file_get_contents($jsonFilePath);
            $data = json_decode($jsonData, true);
            $offers = $data['offers'];
            foreach ($offers as $data) {
                $this->couponService->storeOrUpdate($data);
            }
            // $time = FatchData::latest('id')->first();
            // $last_fatch = strtotime($time->time);
            // $response = $client->request('GET', 'https://couponapi.org/api/getIncrementalFeed', [
            //     'query' => [
            //         'API_KEY'      => '7d6819efb52b054668dceeb903bebafe',
            //         'last_extract' =>  $last_fatch,
            //         'format' => 'json'
            //     ]
            // ]);
            // $responseBody = $response->getBody()->getContents();
            // $data = json_decode($responseBody, true);

            // foreach ($offers as $offer) {
            //     if ($offer['status'] == 'new') {
            //         $this->couponService->storeOrUpdate($offer);
            //     } elseif ($offer['status'] == 'updated') {
            //         $this->couponupdateService->storeOrUpdate($offer);
            //     } elseif ($offer['status'] == 'suspended') {
            //         $coupon = Coupon::where('offer_id', $offer['offer_id'])->update([
            //             'status'  => $offer['status']
            //         ]);
            //     }
            // }
        } catch (\Throwable $th) {
            //throw $th;
        }


        //last data fatch 
        $fatchData = new FatchData();
        $fatchData->user_id =  auth()->user()->id;
        $fatchData->time = Carbon::now();
        $fatchData->save();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
