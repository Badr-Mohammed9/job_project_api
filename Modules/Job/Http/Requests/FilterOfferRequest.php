<?php

namespace Modules\Job\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterOfferRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'exp' => 'nullable|string',
            'category' => 'nullable|string',
            'salaryFrom' => 'required|integer',
            'salaryTo' => 'required|integer',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
