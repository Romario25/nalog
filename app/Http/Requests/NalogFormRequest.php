<?php

namespace App\Http\Requests;

use DateTime;
use Illuminate\Foundation\Http\FormRequest;

class NalogFormRequest extends FormRequest
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
            'group' => 'required',
            'dateFrom' => 'required|date|Period:dateTo,'.$this->get('dateTo'),
            'dateTo' => 'required|date',
            'year' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'group.required' => 'Необходимо указать группу',
            'dateFrom.required'  => 'Необходимо указать дату от',
            'dateTo.required'  => 'Необходимо указать дату до',
            'dateFrom.Period' => 'Не верно выбран период',
            'year.required' => 'Укажите текущий год'
        ];
    }




}
