<?php

include '../Dao/LivroDao.php';
include '../Utilidades/ValidaDados.php';

class Livro {
    
    private $titulo;
    private $autor;
    private $genero; //eng soft, eng energia, eng automotiva, eng elet, eng aero, engenharia
    private $edicao;
    private $editora;
    private $venda;
    private $troca;
    private $estado;
    private $descricao;
    
    
    function __construct($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->edicao = $edicao;
        $this->editora = $editora;
        $this->venda = $venda;
        $this->troca = $troca;
        $this->estado = $estado;
        $this->descricao = $descricao;
    }
    
    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        if(!ValidaDados::validaCamposnulos($titulo)){
            throw new ExcessaoTituloInvalido("Titulo nao pode ser nulo!");
        }else{
            $this->titulo = $titulo;
        }
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
        $this->genero = $genero;
    }

    public function getTroca() {
        return $this->troca;
    }

    public function setTroca($troca) {
        $this->troca = $troca;
    }
    
    public function getVenda() {
        return $this->venda;
    }

    public function setVenda($venda) {
        $this->venda = $venda;
    }
    
    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
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
    
    public function setEdicao($edicao){
        $this->edicao = $edicao;//Precisa validar entrada só de números
    }
    
    public function getEditora(){
        return $this->editora;
    }
    
    public function setEditora($editora){
        
        if(!ValidaDados::validaCamposNulos($editora)){
            throw new ExcessaoEditoraInvalida("O Editora do Livro nao pode ser nula!");
        }else{
            $this->editora = $editora;
        }
    }
    
    public function getEstado() {   
        return $this->estado;
    }
   
    public function setEstado($estado){
        $this->estado = $estado;
    }
    
    public function salvaLivro($titulo, $autor, $editora, $edicao, $venda, $troca, $genero, $estado, $descricao, $id_dono){
        
        $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao);
        return LivroDao::salvaLivro($livro->getTitulo(),$livro->getAutor(),$livro->getEditora(),
        $livro->getEdicao(),$livro->getVenda(),$livro->getTroca(),$livro->getGenero(),$livro->getEstado(), $livro->getDescricao(), $id_dono);
    }
    
    public function pesquisaLivroTitulo($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){
        return LivroDao::pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
    }
    
    public function getLivroById($id){
        return LivroDao::getLivroById($id);
    }
    
    public function deletaLivro($titulo){
        return LivroDao::deletaLivro($titulo);
    }
    
    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id){
        $livro = new Livro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id);
        return LivroDao::alteraLivro($livro->getTitulo(),$livro->getAutor(),$livro->getEditora(),
        $livro->getEdicao(),$livro->getVenda(),$livro->getTroca(),$livro->getGenero(),$livro->getEstado(), $livro->getDescricao());
    }
}
?>
