<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignMonitorContentRequest extends FormRequest
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
            'monitor_id' => 'required|exists:monitors,id',
            'product_model_id' => 'required|exists:models,id',
            'work_instructions' => 'required|array',
            'work_instructions.*' => 'exists:work_instructions,id',
        ];
    }
}
