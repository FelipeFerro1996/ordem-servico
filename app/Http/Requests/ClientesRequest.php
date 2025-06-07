<?php

namespace App\Http\Requests;

use App\Rules\CpfUnico;
use App\Rules\CpfValido;
use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            'nome'=>'required|max:255|min:3',
            'cpf'=>['required', 'string', new CpfValido, new CpfUnico($this->route('cliente')??'')]
        ];
    }
}
