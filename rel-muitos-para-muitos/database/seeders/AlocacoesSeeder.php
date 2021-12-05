<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AlocacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('alocacoes')->insert(['desenvolvedor_id' => 1,'projeto_id' => 1,'horas_semanais' => 22]);
        DB::table('alocacoes')->insert(['desenvolvedor_id' => 2,'projeto_id' => 1,'horas_semanais' => 22]);
        DB::table('alocacoes')->insert(['desenvolvedor_id' => 2,'projeto_id' => 2,'horas_semanais' => 22]);
        DB::table('alocacoes')->insert(['desenvolvedor_id' => 3,'projeto_id' => 2,'horas_semanais' => 22]);
        DB::table('alocacoes')->insert(['desenvolvedor_id' => 1,'projeto_id' => 3,'horas_semanais' => 22]);
        DB::table('alocacoes')->insert(['desenvolvedor_id' => 2,'projeto_id' => 3,'horas_semanais' => 22]);
        DB::table('alocacoes')->insert(['desenvolvedor_id' => 3,'projeto_id' => 3,'horas_semanais' => 22]);     
    }
}
