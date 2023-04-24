<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoryRequest extends FormRequest
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
            'published_at' => 'nullable|date',
            'path' => 'nullable|array|max:20',
            'images' => 'nullable|array|max:20',
            'images.*' => 'image|max:4096|mimes:jpg,jpeg,png,',
        ];
    }
}
