<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreWordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'english' => 'required|string|max:64',
            'part_of_speech' => [
                'required',
                'string',
                'max:64',
                Rule::unique('words', 'part_of_speech')
                    ->where('english', $this->english)
                    ->ignore($this->id),
            ]
        ];
    }
}
