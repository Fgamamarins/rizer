<?php

namespace App\Http\Requests\Support;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SupportTicketPostRequest extends FormRequest
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
        return [
            "subject" => "required|max:255",
            "description" => "required|max:1000",
            "open_ticket_date" => "required|date",
            "status_enum" => "required|numeric"
        ];
    }

    /**
     * Get custom messages for validator errors.
     * @return array
     */
    public function messages()
    {
        return [
            "subject.required"    => "Assunto obrigatório",
            "description.max"       => "Descrição obrigatória",
            "open_ticket_date.required"   => "Data de criação obrigatória",
            "status_enum.required" => "Status obrigatório",
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
                "open_ticket_date" =>Carbon::createFromDate($this->open_ticket_date)->toDateTimeString()
            ]
        );
    }
}
