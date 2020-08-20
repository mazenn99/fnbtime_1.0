<?php

namespace App\Http\Requests;

use App\Http\Middleware\is_admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateAdminRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()->is_admin == 1) {
            return true;
        } else {
            return abort('403');
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ];
    }
}
