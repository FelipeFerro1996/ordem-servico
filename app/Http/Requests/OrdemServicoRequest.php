<?php

namespace App\Http\Requests;

use App\Rules\CpfValido;
use Illuminate\Foundation\Http\FormRequest;

class OrdemServicoRequest extends FormRequest
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
            'nome_consumidor'=>'required|max:255|min:3',
            'cpf_consumidor'=>['required', 'string', new CpfValido],
            'numero'=>'required|max:100|unique:ordem_servicos,numero',
            'data_abertura'=>'required|date_format:Y-m-d',
            'produtos_id'=>'exists:produtos,id'
        ];
    }
}
