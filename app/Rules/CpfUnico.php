<?php

namespace App\Rules;

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

        $query = Clientes::where('cpf', $cpfHash);

        if ($this->ignoreId) {
            $query->where('id', '!=', $this->ignoreId);
        }

        if ($query->exists()) {
            $fail('Esse CPF já está cadastrado.');
        }
    }
}
