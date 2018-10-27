<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UpdateUserRequest extends FormRequest
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
     * @param Request $request
     * @return array
     */
    public function rules(Request $request)
    {
        return [
            'username' => 'required|unique:users,id,' . $request->get('id'),
            'email' => 'required|unique:users,id,' . $request->get('id'),
            'phone' => 'required|unique:users,id,' . $request->get('id'),
            'avatar_file' => 'image'
        ];
    }
}
