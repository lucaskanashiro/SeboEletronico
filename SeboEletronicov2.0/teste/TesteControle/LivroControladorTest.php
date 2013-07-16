<?php

require_once "../../Modelo/Livro.php";
require_once "../../Controle/LivroControlador.php";
require_once "../../Dao/LivroDao.php";
require_once "../../Utilidades/ValidaDados.php";
require_once "../../Utilidades/ExcessaoNomeInvalido.php";
require_once "../../Utilidades/ExcessaoTituloInvalido.php";
require_once "../../Utilidades/ExcessaoEditoraInvalida.php";
require_once "../../Utilidades/ConexaoComBanco.php";

class LivroControladorTest extends PHPUnit_Framework_TestCase{
    
    protected $livroControladorTeste;
    protected $livroTeste;

    protected function setUp() {
        $this->livroTeste = new Livro('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal');
        $this->livroControladorTeste = new LivroControlador();
    }

    protected function tearDown() {
        unset($this->livroControladorTeste);
        unset($this->livroTeste);
        
    }

    public function testSalvaLivro() {
        $retorno = $this->livroControladorTeste->salvaLivro('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal', 23);
        $this->assertTrue($retorno);
    }
    
    public function testPesquisaLivro() {
        $retorno = $this->livroControladorTeste->pesquisaLivro($this->livroTeste->getTitulo(), 'novo', 'usado', 
                'venda', 'troca');
        $this->assertFalse($retorno);
    }

    public function testGetLivroByIdComIdNulo() {
            $retorno = $this->livroControladorTeste->getLivroById(null);
            $this->assertFalse($retorno);    
    }
    
    public function testGetLivroByIdComIdNegativo() {
            $retorno = $this->livroControladorTeste->getLivroById(-3);
            $this->assertFalse($retorno);    
    }
    
    public function testGetLivroByIdComIdValido() {
            $retorno = $this->livroControladorTeste->getLivroById(7);
            $this->assertEquals(23, $retorno[1]);
            $this->assertEquals($this->livroTeste->getTitulo(), $retorno[2]);
            $this->assertEquals($this->livroTeste->getEditora(), $retorno[3]);
            $this->assertEquals($this->livroTeste->getAutor(), $retorno[4]);
            $this->assertEquals($this->livroTeste->getEdicao(), $retorno[5]);
            $this->assertEquals($this->livroTeste->getGenero(), $retorno[6]);
            $this->assertEquals($this->livroTeste->getEstado(), $retorno[7]);
            $this->assertEquals($this->livroTeste->getDescricao(), $retorno[8]);
            $this->assertEquals($this->livroTeste->getVenda(), $retorno[9]);
            $this->assertEquals($this->livroTeste->getTroca(), $retorno[10]);  
    }

    public function testDeletaLivro() {
        $retorno = $this->livroControladorTeste->deletaLivro(15);
        $this->assertTrue($retorno);    
    }

    public function testAlteraLivro() {
            $retorno = $this->livroControladorTeste->alteraLivro('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal', 23,16);
            $this->assertTrue($retorno);    
    }

    public function testGetLivroByIdUsuario() {
        $retorno = $this->livroControladorTeste->getLivroByIdUsuario(23);
        $this->assertFalse($retorno);    
    }
    
    public function testGetAllLivro(){
        $retorno = $this->livroControladorTeste->getAllLivro(23);
        $this->assertFalse($retorno);
    }       
//
//    
    }

?>

