<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'name'     => ['required', 'string', 'max: 50'],
            'last_name' => ['nullable', 'string', 'max: 50'],
            'username' => ['required', 'string', 'max:100', 'unique:users,username,' . $this->user],
            'email'    => ['required', 'string', 'max: 100', 'unique:users,email,' . Auth::user()->id],
            'type'     => ['nullable', 'string'],
            'gender'   => ['nullable', 'string'],
            'address'  => ['nullable', 'string'],
            'city'     => ['nullable', 'string'],
            'country'  => ['nullable', 'string'],
            'zip_code' => ['nullable', 'numeric'],
            'address'  => ['nullable', 'string'],
            'password' => ['nullable'],
            'phone'    => ['nullable', 'max: 25', 'unique:users,phone,' . $this->id],
            'avatar'   => ['nullable', 'mimes:png,jpg,svg,jpeg', 'max:1024'],
        ];


        return $rules;
    }
}
