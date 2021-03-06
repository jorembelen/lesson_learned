<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => ['required',
            Rule::unique('users','email')->ignore($this->user)],
            'role' => 'required',
            'project_location_id' => 'required_if:role,0,1',
        ];
    }

    public function messages()
    {
        return [
            'project_location_id.required_if' => 'Please select project location.',
        ];
    }

}
