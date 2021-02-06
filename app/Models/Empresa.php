<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_da_empresa',
        'cnpj',
        'email',
        'telefone',
        'nome_representante',
        'cpf_representante',
        'email_representante',
        'telefone_representante',
        'endereco',
        'numero',
        'bairro',
        'complemento',
        'cep',
        'cidade'
    ];
}
