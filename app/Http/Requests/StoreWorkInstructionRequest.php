<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWorkInstructionRequest extends FormRequest
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
            'model_id'    => 'required|exists:models,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_path'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:20480',
        ];
    }
}
