<?php

require_once "../../Modelo/Usuario.php";
require_once "../../Utilidades/ValidaDados.php";
require_once "../../Utilidades/ExcessaoNomeInvalido.php";
require_once "../../Utilidades/ExcessaoSenhaInvalida.php";
require_once "../../Utilidades/ExcessaoTelefoneInvalido.php";
require_once "../../Utilidades/ExcessaoEmailInvalido.php";

class UsuarioTest extends PHPUnit_Framework_TestCase{

	protected $usuarioTeste;

	protected function setUp(){
                $senha = array(123456, 123456);
		$this->usuarioTeste = new Usuario('Lucas', 88888888, 'lucas-kanashiro@hotmail.com', $senha);
	}	

	protected function tearDown(){
		unset($this->usuarioTeste);
	}

	public function testConstrutor(){
		$this->assertNotNull($this->usuarioTeste);
	}

	public function testGetNome(){
		$this->assertEquals('Lucas', $this->usuarioTeste->getNome());
	}

	public function testSetNome(){
		$nome = 'Maria';
		$this->usuarioTeste->setNome($nome);
		$this->assertEquals($nome, $this->usuarioTeste->getNome());
	}

	/**
	 * @expectedException ExcessaoNomeInvalido
	 */
	public function testSetNomeNulo(){
		$nome = null;
		$this->usuarioTeste->setNome($nome);
	}

	/**
	 * @expectedException ExcessaoNomeInvalido
	 */
	public function testSetNomeComCaracterInvalido(){
		$nome = 123;
		$this->usuarioTeste->setNome($nome);
	}

	public function testGetTelefone(){
		$this->assertEquals(88888888, $this->usuarioTeste->getTelefone());
	}

	public function testSetTelefone(){
		$telefone = 99999999;
		$this->usuarioTeste->setTelefone($telefone);
		$this->assertEquals($telefone, $this->usuarioTeste->getTelefone());
	}

	/**
	 * @expectedException ExcessaoTelefoneInvalido
	 */
	public function testSetTelefoneNulo(){
		$telefone = null;
		$this->usuarioTeste->setTelefone($telefone);
	}

	/**
	 * @expectedException ExcessaoTelefoneInvalido
	 */
	public function testSetTelefoneComCaracterInvalido(){
		$telefone = 'abc';
		$this->usuarioTeste->setTelefone($telefone);
	}

	public function testGetEmail(){
		$this->assertEquals('lucas-kanashiro@hotmail.com', $this->usuarioTeste->getEmail());
	}

	public function testSetEmail(){
		$email = 'kanashiro@gmail.com';
		$this->usuarioTeste->setEmail($email);
		$this->assertEquals($email, $this->usuarioTeste->getEmail());
	}

	/**
	 * @expectedException ExcessaoEmailInvalido
	 */
	public function testSetEmailInvalido(){
		$email = 'kanashiro';
		$this->usuarioTeste->setEmail($email);
	}

	/**
	 * @expectedException ExcessaoEmailInvalido
	 */
	public function testSetEmailNulo(){
		$email = null;
		$this->usuarioTeste->setEmail($email);
       }

	public function testGetSenha(){
                $senha = $this->usuarioTeste->getSenha();
		$this->assertEquals(123456, $senha[0]);
	}

	public function testSetSenha(){
		$senha = array(987656, 987656);
		$this->usuarioTeste->setSenha($senha);
                $senha2 = $this->usuarioTeste->getSenha();
		$this->assertEquals(987656, $senha2[0]);
	}

	/**
	 * @expectedException ExcessaoSenhaInvalida
	 */
	public function testSetSenhaNula(){
		$senha = array(null,null);
		$this->usuarioTeste->setSenha($senha);
	}

	/**
	 * @expectedException ExcessaoSenhaInvalida
	 */
	public function testSetSenhaComValoresDiferentes(){
		$senha = array(987656, 123456);
		$this->usuarioTeste->setSenha($senha);
	}

	/**
	 * @expectedException ExcessaoSenhaInvalida
	 */
	public function testSetSenhaComMaisDe6Digitos(){
		$senha = array(987654321, 987654321);
		$this->usuarioTeste->setSenha($senha);
	}

	/**
	 * @expectedException ExcessaoSenhaInvalida
	 */
	public function testSetSenhaComCaracterInvalido(){
		$senha = array('abc', 'abc');
		$this->usuarioTeste->setSenha($senha);
	}
}

?>

