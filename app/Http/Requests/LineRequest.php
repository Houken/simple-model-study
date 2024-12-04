<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LineRequest extends FormRequest
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
        // dd($this);
        return [
            'book_id' => 'required|exists:App\Models\Book,id',
            'word_id' => 'required|exists:App\Models\Word,id',
            'index_no' => [
                'required',
                'integer',
                'min:1',
                Rule::unique('lines', 'index_no')
                    ->where('book_id', $this->book_id)
                    ->ignore($this->id),
            ],
            'definition' => 'required|string|max:255',
        ];
    }
}
