<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonStoreRequest extends FormRequest
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
            'user_id' => 'required',
            'project_location_id' => 'required',
            'desc_category' => 'required',
            'date_raised' => 'required',
            'event' => 'required',
            'lesson_category' => 'required',
            'warning_signs' => 'required',
            'recommendations' => 'required',
            'action' => 'required',
            'wbs_id' => 'nullable',
            'risk_level' => 'required_if:lesson_category,Negative',
            'owner' => 'required',
            'images.*' => 'image|nullable',
            'attachment' => 'nullable|mimes:zip,doc,docx,xlsx,xls,pdf',
        ];
    }

    protected $messages = [
        'desc_category.required' => 'The descipline category is required.',
    ];

}
