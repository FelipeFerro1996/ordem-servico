<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';

    protected $fillable = [
        'codigo',
        'descricao',
        'status',
        'tempo_garantia'
    ];
}
