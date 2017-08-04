<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreActivities extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:0|max:255|String',
            'description' => 'required|min:0|max:600|String',
            'start_date' => 'required|date|date_format:d/m/Y',
            'finish_date' => 'required_unless:status_id,4|date|date_format:d/m/Y',
            'status_id' => 'required|integer|exists:status,id',
            'situation' => 'required|in:Ativo,Inativo'
        ];
    }
}
