<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [

            'name' => 'required|string',
            'author' => 'required|string',
            'year' => 'required|numeric|max:3000',
            'subject_id' => 'required',
            'description' => 'required|string',
            'file' => 'required',
        ];
    }
}
