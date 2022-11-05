<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyValidate extends FormRequest
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
            'data' => 'required|json',
            'data.*.id' => 'required|integer|exists:produtos,id',
            'data.*.user_qntd' => 'required|integer|min:1|max:produtos,estoque,id',
        ];
    }

    public function messages()
    {
        return [
            'data.required' => 'É obrigatório enviar os dados no formato json.',
            'data.user_qntd.required' => 'É obrigatório adicionar a quantidade do produto.',
            'data.user_qntd.integer' => 'A quantidade deve um número inteiro.',
            'data.user_qntd.max' => 'A quantidade deve ser menor ou igual o estoque'
        ];
    }
}
