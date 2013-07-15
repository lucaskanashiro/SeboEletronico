<?php

require_once "../SeboEletronico/SeboEletronicov2.0/Modelo/Usuario.php";
//require_once "../SeboEletronico/SeboEletronicov2.0/Utilidades/ValidaDados.php";
//require_once "../SeboEletronico/SeboEletronicov2.0/Utilidades/ExcessaoNomeInvalido.php";
//require_once "../SeboEletronico/SeboEletronicov2.0/Utilidades/ExcessaoSenhaInvalida.php";
//require_once "../SeboEletronico/SeboEletronicov2.0/Utilidades/ExcessaoTelefoneInvalido.php";
//require_once "../SeboEletronico/SeboEletronicov2.0/Utilidades/ExcessaoEmailInvalido.php";

class UsuarioTest extends PHPUnit_Framework_TestCase{

	protected $usuarioTeste;

	protected function setUp(){
		$this->usuarioTeste = new Usuario('Lucas', 88888888, 'lucas-kanashiro@hotmail.com', 12345);
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
	 * @expectedException InvalidArgumentException
	 */
	public function testSetNomeNulo(){
		$nome = null;
		$this->usuarioTeste->setNome($nome);
	}

	/**
	 * @expectedException InvalidArgumentException
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
	 * @expectedException InvalidArgumentException
	 */
	public function testSetTelefoneNulo(){
		$telefone = null;
		$this->usuarioTeste->setTelefone($telefone);
	}

	/**
	 * @expectedException InvalidArgumentException
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
	 * @expectedException InvalidArgumentException
	 */
	public function testSetEmailInvalido(){
		$email = 'kanashiro';
		$this->usuarioTeste->setEmail($email);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testSetEmailNulo(){
		$email = null;
		$this->usuarioTeste->setEmail($email);
	}

	public function testGetSenha(){
		$this->assertEquals(12345, $this->usuarioTeste->getSenha());
	}

	public function testSetSenha(){
		$senha = array(98765, 98765);
		$this->usuarioTeste->setSenha($senha);
		$this->assertEquals(98765, $this->usuarioTeste->getSenha());
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testSetSenhaNula(){
		$senha = null;
		$this->usuarioTeste->setSenha($senha);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testSetSenhaComValoresDiferentes(){
		$senha = array(98765, 12345);
		$this->usuarioTeste->setSenha($senha);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testSetSenhaComMaisDe6Digitos(){
		$senha = array(987654321, 987654321);
		$this->usuarioTeste->setSenha($senha);
	}

	/**
	 * @expectedException InvalidArgumentException
	 */
	public function testSetSenhaComCaracterInvalido(){
		$senha = array('abc', 'abc');
		$this->usuarioTeste->setSenha($senha);
	}
}

?>

