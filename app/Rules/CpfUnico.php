<?php

namespace App\Rules;

use App\Http\repositories\ClientesRepository;
use App\Models\Clientes;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfUnico implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $ignoreId;

    public function __construct($ignoreId = null)
    {
        $this->ignoreId = $ignoreId;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $cpf = preg_replace('/\D/', '', $value);
        $cpfHash = hash('sha256', $cpf);
       
        $cliente_repository = New ClientesRepository();
        $cliente = $cliente_repository->getClienteBycpf(cpf:$cpfHash, ignoreId:$this->ignoreId??'');

        if (!empty($cliente->id)) {
            $fail('Esse CPF já está cadastrado.');
        }
    }
}
