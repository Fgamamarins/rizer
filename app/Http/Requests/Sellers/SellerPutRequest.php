<?php

namespace App\Http\Requests\Sellers;

use Illuminate\Foundation\Http\FormRequest;

class SellerPutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * @return array
     */
    public function rules()
    {
        return [
            "name"        => "required|max:255",
            "email"       => "required|max:255",
            "phone"       => "required|numeric",
            "status_enum" => "required|numeric",
        ];
    }

    /**
     * Get custom messages for validator errors.
     * @return array
     */
    public function messages()
    {
        return [
            "name.required"        => "Nome obrigatório",
            "name.max"             => "Assunto obrigatório",
            "email.required"       => "Email obrigatório",
            "email.max"            => "Descrição obrigatória",
            "phone.required"       => "Telefone obrigatória",
            "phone.numeric"        => "Telefone deve ser numérico",
            "status_enum.required" => "Status obrigatório",
            "status_enum.numeric"  => "Status deve ser numérico",
        ];
    }

    /**
     * Prepare the data for validation.
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge(
            [
                "phone" => preg_replace('/\D/', '', $this->phone),
            ]
        );
    }
}
