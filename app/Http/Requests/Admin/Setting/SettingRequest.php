<?php

namespace App\Http\Requests\Admin\Setting;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'site_title'              => 'nullable|max       : 160',
            'copy_right'              => 'nullable|max       : 250',
            'meta_keyword'            => 'nullable|max       : 250',
            'meta_title'              => 'nullable|max       : 160',
            'meta_description'        => 'nullable|max       : 250',
            'footer_description'      => 'nullable|max       : 500',
            'newsletter_text'         => 'nullable|max       : 250',
            'category_name'           => 'nullable|max       : 250',
            'favicon_icon'            => 'nullable',
            'main_logo'               => 'nullable',
            'event_day'               => 'nullable',
            'google_ads_js'           => 'nullable',
            'points'                  => 'nullable',

            'phone'                   => 'nullable|max       : 25',
            'email'                   => 'email|string',
            'address'                 => 'nullable|max       : 250',
            'facebook'                => ['nullable', 'regex:/^(https?:\/\/(www\.)?)?([^\s#]+|#)$/i'],
            'twitter'                 => ['nullable', 'regex:/^(https?:\/\/(www\.)?)?([^\s#]+|#)$/i'],
            'instagram'               => ['nullable', 'regex:/^(https?:\/\/(www\.)?)?([^\s#]+|#)$/i'],
            'linkedin'                => ['nullable', 'regex:/^(https?:\/\/(www\.)?)?([^\s#]+|#)$/i'],
            'paypal_baseUri'          => 'nullable',
            'paypal_client_id'        => 'nullable',
            'paypal_client_secret'    => 'nullable',
            'stripe_client_id'        => 'nullable',
            'stripe_client_secret'        => 'nullable',
            'facebook_client_id'      => 'nullable',
            'facebook_client_secret'  => 'nullable',
            'facebook_redirect'       => 'nullable',
            'google_client_id'        => 'nullable',
            'google_client_secret'    => 'nullable',
            'google_redirect'         => 'nullable',
            'coupon_api_key'         => 'nullable',
        ];
    }
}
