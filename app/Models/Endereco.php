<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $table = 'enderecos';

    protected $fillable = [
        'cliente_id',
        'rua',
        'bairro',
        'numero',
        'cidade',
        'estado',
        'cep'
    ];

    public function cliente(){
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }
}
