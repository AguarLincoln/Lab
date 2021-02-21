<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    use HasFactory;

    protected $fillable = [
        'semestre',
        'inicio',
        'fim',
        'professor_id'
    ];

    //Formatando data Inicio
    public function setInicioAttribute($value)
    {
        $this->attributes['inicio'] = Carbon::parse($value)->format('Y/m/d');
    }

    public function getInicioAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    //Formatando da Fim
    public function setFimAttribute($value)
    {
        $this->attributes['fim'] = Carbon::parse($value)->format('Y/m/d');
    }

    public function getFimAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    //relações

    public function alunos()
    {
        return $this->belongsToMany(Aluno::class, 'avaliacoes')->withPivot('ap1', 'ap2', 'ap3', 'relatorio');
    }
}
