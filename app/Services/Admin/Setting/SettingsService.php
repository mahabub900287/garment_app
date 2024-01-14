<?php

namespace App\Services\Admin\Setting;

use App\Models\Setting;
use App\Services\BaseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SettingsService extends BaseService
{
    protected $model;

    public function __construct()
    {
        $this->model = Setting::class;
    }
    public function updateOrStoreSettings(Request $requestSettings)
    {
        try {
            $requestData = $requestSettings->except('_token');
            foreach ($requestData as $key => $value) {
                if (!empty($value)) {

                    Setting::updateOrCreate(
                        ['key' => $key],
                        ['value' => $value]
                    );
                }
            }
            Cache::flush();

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getSettings($key)
    {
        $expire = \Carbon\Carbon::now()->addMinutes(30);
        $settings = Cache::remember('settings-' . $key, $expire, function () use ($key) {
            return Setting::where('key', $key)->first();
        });

        return $settings ? $settings->value : false;
    }
}
