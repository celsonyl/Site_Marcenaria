<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \Illuminate\Support\Facades\DB::table('users')->insert([
        [
          'id' => '1',
          'name' => 'CU DE FOSSA',
          'telefone' => '12378913',
          'email' => '123@gmail.com',
          'password' => '$2y$10$vDcxROnyl6pWI.MdKcAQQOTiXfpiq1yGqA3G78CXhst3j0RiSZr9G',
          'nivel_acesso' => 'admin',
        ],
        [
          'id' => '2',
          'name' => 'CU DE LINGUIÇAR',
          'telefone' => '1237891311',
          'email' => '321@gmail.com',
          'password' => '$2y$10$vDcxROnyl6pWI.MdKcAQQOTiXfpiq1yGqA3G78CXhst3j0RiSZr9G',
          'nivel_acesso' => 'cliente',
        ]
      ]);
    }
}
