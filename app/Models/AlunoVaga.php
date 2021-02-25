<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoVaga extends Model
{
    use HasFactory;

    protected $fillable = [
        'aluno_id',
        'vaga_id'
    ];

    protected $primary = [
        'aluno_id',
        'vaga_id'
    ];
}
