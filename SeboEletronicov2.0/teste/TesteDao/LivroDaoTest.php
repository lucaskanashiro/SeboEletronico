<?php

require_once "../../Modelo/Livro.php";
require_once "../../Dao/LivroDao.php";
require_once "../../Utilidades/ValidaDados.php";
require_once "../../Utilidades/ExcessaoNomeInvalido.php";
require_once "../../Utilidades/ExcessaoTituloInvalido.php";
require_once "../../Utilidades/ExcessaoEditoraInvalida.php";
require_once "../../Utilidades/ConexaoComBanco.php";

class LivroDaoTest extends PHPUnit_Framework_TestCase {

    protected $livroDaoTeste;
    protected $livroTeste;

    protected function setUp() {
        $this->livroTeste = new Livro('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal');
        $this->livroDaoTeste = new LivroDao();
    }

    protected function tearDown() {
        unset($this->livroDaoTeste);
        unset($this->livroTeste);
        
    }

    public function testSalvaLivro() {
        $retorno = $this->livroDaoTeste->salvaLivro($this->livroTeste, 23);
        $this->assertTrue($retorno);
    }
    
    
    public function testPesquisaLivro() {
        $retorno = $this->livroDaoTeste->pesquisaLivro($this->livroTeste->getTitulo(), 'novo', 'usado', 
                'venda', 'troca');
        $this->assertFalse($retorno);
    }

    public function testGetLivroByIdComIdNulo() {
            $retorno = $this->livroDaoTeste->getLivroById(null);
            $this->assertFalse($retorno);    
    }
    
    public function testGetLivroByIdComIdNegativo() {
            $retorno = $this->livroDaoTeste->getLivroById(-3);
            $this->assertFalse($retorno);    
    }
    
    public function testGetLivroByIdComIdValido() {
            $retorno = $this->livroDaoTeste->getLivroById(7);
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
        $retorno = $this->livroDaoTeste->deletaLivro(15);
        $this->assertTrue($retorno);    
    }


    public function testAlteraLivro() {
            $retorno = $this->livroDaoTeste->alteraLivro($this->livroTeste, 23,16);
            $this->assertTrue($retorno);    
    }

    public function testGetLivroByIdUsuario() {
        $retorno = $this->livroDaoTeste->getLivroByIdUsuario(23);
        $this->assertFalse($retorno);    
    }
    
    public function testGetAllLivro(){
        $retorno = $this->livroDaoTeste->getAllLivro(23);
        $this->assertFalse($retorno);
    }


}
