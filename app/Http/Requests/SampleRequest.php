<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SampleRequest extends FormRequest
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
        $id = $this->route('sample');

        switch ($this->method()) {
            case 'POST':
                return [
                    'field_1' => 'required|string|max:255',
                    'field_2' => 'required|string',
                    'field_3' => 'required|integer|min:0',
                    'field_4' => 'required|numeric|min:0',
                    'field_5' => 'required|date',
                    'field_6' => 'nullable|string|in:yes,no',
                ];
                break;
            case 'PUT':
            case 'PATCH':
                return [
                    'field_1' => 'sometimes|required|string|max:255',
                    'field_2' => 'sometimes|required|string',
                    'field_3' => 'sometimes|required|integer|min:0',
                    'field_4' => 'sometimes|required|numeric|min:0',
                    'field_5' => 'sometimes|required|date',
                    'field_6' => 'sometimes|nullable|string|in:yes,no',
                ];
                break;
            default:
                return [];
        }
    }
}