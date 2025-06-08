<?php

namespace App\Http\Requests;

use App\StatusProduto;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Enum;

class ProdutosRequest extends FormRequest
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
            'codigo' => [
                'required',
                'string',
                Rule::unique('produtos', 'codigo')->ignore($this->route('produto')??''), // 👈 ignora o atual
            ],
            'descricao' => 'required|string',
            'status' => ['required', new Enum(StatusProduto::class)],
            'tempo_garantia' => 'required|integer|min:0',
        ];
    }
}
