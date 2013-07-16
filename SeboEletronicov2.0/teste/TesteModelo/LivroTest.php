<?php

require_once "../../Modelo/Livro.php";
require_once "../../Utilidades/ValidaDados.php";
require_once "../../Utilidades/ExcessaoEditoraInvalida.php";
require_once "../../Utilidades/ExcessaoTituloInvalido.php";
require_once "../../Utilidades/ExcessaoNomeInvalido.php";

class LivroTest extends PHPUnit_Framework_TestCase{

	protected $livroTeste;

	protected function setUp(){
		$this->livroTeste = new Livro('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo', 'livro e muito legal');
	}

	protected function tearDown(){
		unset($this->livroTeste);
	}

	public function testConstrutor(){
		$this->assertNotNull($this->livroTeste);
	}

	public function testGetTitulo(){
		$this->assertEquals('calculo 1', $this->livroTeste->getTitulo());
	}	

	public function testSetTitulo(){
		$titulo = 'calculo 2';
		$this->livroTeste->setTitulo($titulo);
		$this->assertEquals($titulo, $this->livroTeste->getTitulo());
	}

	/**
	 * @expectedException ExcessaoTituloInvalido
	 */
	public function testSetTituloNulo(){
		$titulo = null;
		$this->livroTeste->setTitulo($titulo);
	}

	public function testGetAutor(){
		$this->assertEquals('Thomas', $this->livroTeste->getAutor());
	}

	public function testSetAutor(){
		$autor = 'Joao';
		$this->livroTeste->setAutor($autor);
		$this->assertEquals($autor, $this->livroTeste->getAutor());
	}

	/**
	 * @expectedException ExcessaoNomeInvalido
	 */
	public function testSetAutorNulo(){
		$autor = null;
		$this->livroTeste->setAutor($autor);
	}

	/**
	 * @expectedException ExcessaoNomeInvalido
	 */
	public function testSetAutorComCaracterInvalido(){
		$autor = 12345;
		$this->livroTeste->setAutor($autor);
	}

        /**
	 * @expectedException ExcessaoNomeInvalido
	 */
	public function testSetAutorComApenasEspacos(){
		$autor = "      ";
		$this->livroTeste->setAutor($autor);
	}
        
	public function testGetGenero(){
		$this->assertEquals('engenharia', $this->livroTeste->getGenero());
	}

	public function testSetGenero(){
		$genero = 'software';
		$this->livroTeste->setGenero($genero);
		$this->assertEquals($genero, $this->livroTeste->getGenero());
	}

	public function testGetTroca(){
		$this->assertEquals('troca', $this->livroTeste->getTroca());
	}

	public function testSetTroca(){
		$troca = False;
		$this->livroTeste->setTroca($troca);
		$this->assertEquals($troca, $this->livroTeste->getTroca());
	}

	public function testGetVenda(){
		$this->assertEquals('venda', $this->livroTeste->getVenda());
	}

	public function testSetVenda(){
		$venda = False;
		$this->livroTeste->setVenda($venda);
		$this->assertEquals($venda, $this->livroTeste->getVenda());
	}
        
        public function testGetDescricao(){
            $this->assertEquals('livro e muito legal', $this->livroTeste->getDescricao());
            
        }
        
        public function testSetDescricao(){
            $this->livroTeste->setDescricao('livro demais');
            $this->assertEquals('livro demais', $this->livroTeste->getDescricao());
        }

	public function testDefineTiposDeGeneros(){
		$resultado = $this->livroTeste->defineTiposDeGeneros();
		$this->assertEquals('Engenharia', $resultado[0]);
		$this->assertEquals('Engenharia de Software', $resultado[1]);
		$this->assertEquals('Engenharia Eletronica', $resultado[2]);
		$this->assertEquals('Engenharia de Energia', $resultado[3]);
		$this->assertEquals('Engenharia Automotiva', $resultado[4]);
		$this->assertEquals('Engenharia Aeroespacial', $resultado[5]);
	}

	public function testGetEdicao(){
		$this->assertEquals(2, $this->livroTeste->getEdicao());
	}

	public function testSetEdicao(){
		$edicao = 5;
		$this->livroTeste->setEdicao($edicao);
		$this->assertEquals($edicao, $this->livroTeste->getEdicao());
	}

	public function testGetEditora(){
		$this->assertEquals('editora teste', $this->livroTeste->getEditora());
	}

	public function testSetEditora(){
		$editora = 'editora teste 2';
		$this->livroTeste->setEditora($editora);
		$this->assertEquals($editora, $this->livroTeste->getEditora());
	}

	/**
	 * @expectedException ExcessaoEditoraInvalida
	 */
	public function testSetEditoraNula(){
		$editora = null;
		$this->livroTeste->setEditora($editora);
	}

	public function testGetEstado(){
		$this->assertEquals('novo', $this->livroTeste->getEstado());
	}

	public function testSetEstado(){
		$estado = 'usado';
		$this->livroTeste->setEstado($estado);
		$this->assertEquals($estado, $this->livroTeste->getEstado());
	}
}

?>

