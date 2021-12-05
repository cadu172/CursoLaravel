<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert([
            'nome' => 'Carlos Eduardo',
            'cargo' => 'Desenvolvedor FullStack'
        ]);

        DB::table('desenvolvedores')->insert([
            'nome' => 'Dos Santos',
            'cargo' => 'DBA'
        ]);
        
        DB::table('desenvolvedores')->insert([
            'nome' => 'Roberto',
            'cargo' => 'Desenvolvedor Fron-End'
        ]);
    }
}
