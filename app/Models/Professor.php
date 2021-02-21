<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Professor extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;


    protected $table = 'professores';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome',
        'sexo',
        'data_nasc',
        'email',
        'senha',
        'cpf',
        'rg',
        'telefone',
        'endereco',
        'numero',
        'bairro',
        'complemento',
        'cep',
        'cidade'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setDataNascAttribute($value)
    {
        $this->attributes['data_nasc'] = Carbon::parse($value)->format('Y/m/d');
    }

    public function getDataNascAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }
}
