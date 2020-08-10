<?php

use Illuminate\Database\Seeder;

class ProdutoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('produtos')->insert([
            [
              'id' => '1',
              'nome' => 'CU DE FOSSA',
              'descricao' => 'ABCDEF',
              'valor' => '150',
              'foto' => 'default',
              'disponivel' => 'on',
            ],
            [
                'id' => '2',
                'nome' => 'CU DE FOSSA',
                'descricao' => 'GHIJK',
                'valor' => '200',
                'foto' => 'default',
                'disponivel' => 'on',
            ],
            [
                'id' => '3',
                'nome' => 'CU DE ALIKATER',
                'descricao' => 'IJOQIP',
                'valor' => '100',
                'foto' => 'default',
                'disponivel' => 'on',
            ],
            [
                'id' => '4',
                'nome' => 'CU DE PINTO',
                'descricao' => 'DKQQJ',
                'valor' => '300',
                'foto' => 'default',
                'disponivel' => 'off',
            ]
          ]);
    }
}
