<?php

class Livro {
    private $titulo;
    private $autor;
    private $genero;
    private $tipoDeOperacao;//compra, venda, troca
    
    function __construct($titulo, $autor, $genero, $tipoDeOperacao) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->tipoDeOperacao = $tipoDeOperacao;
    }

    
    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function getTipoDeOperacao() {
        return $this->tipoDeOperacao;
    }

    public function setTipoDeOperacao($tipoDeOperacao) {
        $this->tipoDeOperacao = $tipoDeOperacao;
    }



    
    
}
?>
