<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';
    
    protected $fillable = [
        'nome', 
        'cpf'
    ];

    protected function cpf(): Attribute
    {
        return Attribute::make(
            set: function($value){
                $cpf = preg_replace('/\D/', '', $value);
                return hash('sha256', $cpf);
            }
        );
    } 
}
