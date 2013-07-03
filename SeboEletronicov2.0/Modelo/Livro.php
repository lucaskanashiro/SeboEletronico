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
        //Nao tera tratamento de excessao, pois o titulo é pessoal e vai de cada autor, 
        //logo pode ter qualquer tipo de caracter que o autor desejar
    }
    

    public function getAutor() {
        return $this->autor;   
    }

    public function setAutor($autor) {
        if(!ValidaDados::validaCamposNulos($autor)){
            throw new ExcessaoNomeInvalido("O nome do Autor nao pode ser nulo!");
        }elseif(!ValidaDados::validaNome($autor)){
            throw new ExcessaoNomeInvalido("Nome contem caracteres invalidos!");
        }else{
            $this->autor = $autor;
        }
    }

    public function getGenero() {
        return $this->genero;
    }

    public function setGenero($genero) {
        if(!ValidaDados::validaGenero($genero)){
            throw new ExcessaoGeneroInvalido("Genero nao existente na lista de generos do sistema!");
        }elseif(!ValidaDados::validaCamposNulos($genero)){
            throw new ExcessaoGeneroInvalido("O genero do Livro nao pode ser nulo!");
        }else{
            $this->genero = $genero;
        }
    }

    public function getTipoDeOperacao() {
        return $this->tipoDeOperacao;
    }

    public function setTipoDeOperacao($tipoDeOperacao) {
        $this->tipoDeOperacao = $tipoDeOperacao;
    }

    public function defineTiposDeGeneros() {
        define("MATEMATICA", "Matematica", TRUE);
        define("FISICA", "Fisica", TRUE);
        define("MEIO_AMBIENTE", "Meio-Ambiente", TRUE);
        define("TECNOLOGIA_DA_INFORMACAO", "Tecnologia da Informacao", TRUE);
        
        return array(MATEMATICA, FISICA, MEIO_AMBIENTE, TECNOLOGIA_DA_INFORMACAO);
    }
}
?>
