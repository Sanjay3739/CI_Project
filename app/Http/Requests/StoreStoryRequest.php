<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'mission_id' => 'required',
            'title' => 'required|string|max:255',
            'description' => 'required|max:40000',
            'published_at' => 'required|date',
            'path' => 'required|array|max:20',
            'path.*' => 'required|url',
            'images' => 'required|array|max:20',
            'images.*' => 'image|max:4096|mimes:jpg,jpeg,png,',
        ];
    }
    public function messages()
    {
        return [

            'url' => 'The video URL must be a valid URL.',
            'path.max' => 'maximum 20 URL can be uploaded',
            'mimes' => 'The :attribute field must be a file of type: :values.',
            'published_at.required' => 'The date field is required.',
            // 'images.*' => 'photo size should not be more then 4 MB',
            'images.max' => 'maximum 20 photos can be uploaded',
            'path.*.regex' => 'please enter a valid youtube URL on index :index of the video URL'
        ];
    }
}
