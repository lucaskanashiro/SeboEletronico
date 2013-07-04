<?php

class Livro {
    
    
    private $titulo;
    private $autor;
    private $genero; //eng soft, eng energia, eng automotiva, eng elet, eng aero, engenharia
    private $edicao;
    private $editora;
    private $tipoDeOperacao;//compra, venda, troca
    
    
    function __construct($titulo, $autor, $genero, $edicao, $editora, $tipoDeOperacao) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->edicao = $edicao;
        $this->editora = $editora;
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

    public function defineTiposDeGeneros() { //Genero por engenharia
        define("ENGENHARIA", "Engenharia", TRUE);
        define("SOFTWARE", "Engenharia de Software", TRUE);
        define("ELETRONICA", "Engenharia Eletronica", TRUE);
        define("ENERGIA", "Engenharia de Energia", TRUE);
        define("AUTOMOTIVA", "Engenharia Automotiva", TRUE);
        define("AEROESPACIAL", "Engenharia Aeroespacial", TRUE);
        
        return array(ENGENHARIA,SOFTWARE, ELETRONICA, ENERGIA, AUTOMOTIVA, AEROESPACIAL);
    }
    
    public function getEdicao() {
        return $this->edicao;
    }
    
    public function setEdicao(){
        $this->edicao;//Precisa validar entrada só de números
    }
    
    public function getEditora(){
        return $this->editora;
    }
    
    public function setEditora(){
        $this->editora;
    }
}
?>
