<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Alerta extends Component
{
    
    public $tipo;
    public $titulo;
    public $mensagem;
    
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tipo, $titulo, $mensagem)
    {
        $this->tipo = $tipo;        
        $this->titulo = $titulo;        
        $this->mensagem = $mensagem;        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.alerta');
    }
}
