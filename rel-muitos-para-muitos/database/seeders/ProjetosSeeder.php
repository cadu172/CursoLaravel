<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert([
            'nome' => 'Task List de Projetos',
            'estimativa_horas' => 200
        ]);

        DB::table('projetos')->insert([
            'nome' => 'Gestão de Bibliotecas',
            'estimativa_horas' => 500
        ]);
        
        DB::table('projetos')->insert([
            'nome' => 'Novo Projeto Teste',
            'estimativa_horas' => 700
        ]);        
    }
}
