<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{

    protected $table = 'empresas';

    protected $fillable = [
        'cnpj',
        'razao_social',
        'nome',
        'cep',
        'logradouro',
        'numero',
        'telefone',
        'email',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'segmento',
        'inscricao_municipal',
        'inscricao_estadual'
    ];

    public function setCnpjAttribute($value)
    {
        $this->attributes['cnpj'] = preg_replace('/\D/', '', $value);
    }

    public function getCnpjAttribute($value)
    {
        return $this->mask($value, '##.###.###/####-##');
    }


    /**
     * Adiciona máscara a string
     *
     * @param String $string
     *
     * @return String
     */
    private static function mask($val, $mask)
    {
        $maskared = '';
        $k = 0;
        for ($i = 0; $i <= strlen($mask) - 1; $i++) {
            if ($mask[$i] == '#') {
                if (isset($val[$k]))
                    $maskared .= $val[$k++];
            } else {
                if (isset($mask[$i]))
                    $maskared .= $mask[$i];
            }
        }
        return $maskared;
    }
}
