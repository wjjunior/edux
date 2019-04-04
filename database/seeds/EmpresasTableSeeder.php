<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'cnpj' => '86923736000157',
            'razao_social'  => 'Wagner LTDA',
            'nome' => 'Wagner',
            'cep'   => 34000455,
            'logradouro'    => 'Rua Quintino Bocaiuva',
            'numero'    => '509',
            'telefone'  => '31996444596',
            'email' => 'wagner.junior30@gmail.com',
            'complemento'   => 'casa',
            'bairro'    => 'Boa Vista',
            'cidade'    => 'Nova Lima',
            'estado'    => 'MG',
            'segmento'  => 0,
            'inscricao_municipal'   => '9434727479301',
            'inscricao_estadual'    => '9434727479301',
            'nome' => 'Eduxe'
        ]);
    }
}
