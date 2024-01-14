<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'last_name'=> ['required', 'string', 'max: 50'],
            'username'    => ['required', 'string', 'max:100', 'unique:users,username,' . $this->user],
            'email'    => ['required', 'string', 'max:100', 'unique:users,email,'.$this->user],
            'type'     => ['nullable', 'string'],
            'gender'   => ['nullable', 'string'],
            'password' => ['nullable'],
            'phone'    => ['required', 'string', 'max: 25', 'regex  : /^[0-9\-\+]+$/', 'unique:users,phone,'.$this->user],
            'avatar'   => ['nullable', 'mimes:png,jpg,svg,jpeg', 'max:1024'],
        ];
        return $rules;
    }
}
