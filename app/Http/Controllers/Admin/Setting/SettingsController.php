<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;
use App\Services\Admin\Setting\SettingsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SettingRequest;
use App\Models\EventDay;

class SettingsController extends Controller
{
    public $user;

    private $settingsService;

    public function __construct()
    {
        $this->settingsService = new SettingsService();
    }

    public function index()
    {
        $page_title = 'All Setting List';
        return view('admin.settings.index', compact('page_title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SettingStore(SettingRequest $request)
    {
        //data validatioon
        $data = $request->validated();

        $status = $this->settingsService->updateOrStoreSettings($request);
        if ($status) {
            $notify[] = ['success', 'Setting Create successful'];

            return back()->withNotify($notify);
        } else {
            $notify[] = ['warning', 'Setting update failed'];

            return back()->withNotify($notify);
        }
    }
}
