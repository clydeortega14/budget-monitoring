<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBudgetRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'process_id' => 'required|integer',
            'particular' => 'required|string|max:255',
            'branch' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'type_of_budget' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'amount' => 'required',
            'remarks' => 'required'
        ];
    }
}
