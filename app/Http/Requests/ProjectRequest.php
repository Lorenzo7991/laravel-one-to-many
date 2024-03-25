<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'technologies_used' => 'required|string',
            'status' => 'required|string|in:suspended,progress,completed',
            'thumb' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'documentation' => 'required|url',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title must be a string.',
            'title.max' => 'The title may not be greater than :max characters.',
            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a string.',
            'start_date.required' => 'The start date field is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'end_date.required' => 'The end date field is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',
            'technologies_used.required' => 'The technologies used field is required.',
            'technologies_used.string' => 'The technologies used must be a string.',
            'status.required' => 'The status field is required.',
            'status.string' => 'The status must be a string.',
            'status.in' => 'The status must be one of the following: pending, ongoing, completed.',
            'thumb.mimes' => 'The file uploaded for the thumbnail must be an image.',
            'documentation.required' => 'The documentation URL field is required.',
            'documentation.url' => 'The documentation URL must be a valid URL.',
        ];
    }
}
