<?php

use Illuminate\Support\Facades\Route;
use App\Models\Desenvolvedor;
use App\Models\Projeto;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/desenvolvedor_projeto', function () {

    // aula 132

    $desenvolvedores = Desenvolvedor::with('projetos')->get();

    foreach($desenvolvedores as $dev) {
        echo "<p>Nome do Desenvolvedor: " . $dev->nome . "</p>";
        echo "<p>Cargo: " . $dev->cargo . "</p>";

        if ( count($dev->projetos) > 0 ) {
            echo "Projetos <br />";
            echo "<ul>";

            foreach($dev->projetos as $proj) {
                echo "<li>";
                echo "Nome: " . $proj->nome . " | ";
                echo "Horas: " . $proj->estimativa_horas . " | ";
                echo "Trabalhadas: " . $proj->pivot->horas_semanais;
                echo "</li>";;
            }

            echo "</ul>";
        }

        echo "<hr />";

    }

    //return $desenvolvedores->toJson();
});


Route::get('/projeto_desenvolvedores', function() {

    $projetos = Projeto::with('desenvolvedores')->get();

    foreach($projetos as $proj) {
        echo "<p>Nome do Projeto: " . $proj->nome . "</p>";
        echo "<p>Estimativa Horas: " . $proj->estimativa_horas . "</p>";

        if ( count($proj->desenvolvedores) > 0 ) {
            echo "Desenvolvedores <br />";
            echo "<ul>";

            foreach($proj->desenvolvedores as $dev) {
                echo "<li>";
                echo "Nome: " . $dev->nome . " | ";
                echo "Cargo: " . $dev->cargo . " | ";
                echo "Horas/Semana: " . $dev->pivot->horas_semanais;
                echo "</li>";
            }

            echo "</ul>";
        }

        echo "<hr />";

    }

    //return $projetos->toJson();

});



Route::get('/projeto_alocar', function() {

    $projeto = Projeto::find(1);

    if( isset($projeto) ) {
        
        /*
         este comando abaixo faz o inser do desenvolvedor id=3 no projeto id=1, com 33 horas semannais
        */
        $projeto->desenvolvedores()->attach([
            1=>['horas_semanais'=>31],
            2=>['horas_semanais'=>32],
            3=>['horas_semanais'=>33]
        ]);

    }

});


Route::get('/projeto_desalocar', function() {

    $projeto = Projeto::find(1);

    if( isset($projeto) ) {
        
        /*
         este comando abaixo faz o inser do desenvolvedor id=3 no projeto id=1, com 33 horas semannais
        */
        $projeto->desenvolvedores()->detach([1,2,3]);

    }

});

/*

Exercicio:

Fazer a mesma coisa da aula 132

A partir de projeto

Listar desenvolvedor por desenvolvedor e
somar quanto que cada desenvolvedor está trabalhando  em cada projketo


Projeto1
    Desenvolvedor1
        Horas no projeto: x
        Horas Trabalhadas: y

    Desenvolvedor2
        Horas no projeto: x
        Horas Trabalhadas: y

    Desenvolvedor3
        Horas no projeto: x
        Horas Trabalhadas: y

Projeto2
    Desenvolvedor1
        Horas no projeto: x
        Horas Trabalhadas: y

    Desenvolvedor2
        Horas no projeto: x
        Horas Trabalhadas: y

    Desenvolvedor3
        Horas no projeto: x
        Horas Trabalhadas: y

Projeto3
    Desenvolvedor1
        Horas no projeto: x
        Horas Trabalhadas: y

    Desenvolvedor2
        Horas no projeto: x
        Horas Trabalhadas: y

    Desenvolvedor3
        Horas no projeto: x
        Horas Trabalhadas: y


        */
