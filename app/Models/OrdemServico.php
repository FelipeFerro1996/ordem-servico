<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    protected $table = 'ordem_servicos';

    protected $fillable = [
        'numero',
        'data_abertura',
        'clientes_id',
        'produtos_id'
    ];

    public function cliente(){
        return $this->belongsTo(Clientes::class, 'clientes_id');
    }

    public function produto(){
        return $this->belongsTo(Produtos::class, 'produtos_id');
    }
}
