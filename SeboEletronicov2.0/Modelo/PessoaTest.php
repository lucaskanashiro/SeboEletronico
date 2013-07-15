<?php

//require_once '/usr/share/php/PHPUnit:/usr/share/PEAR';

require_once "Pessoa.php";

class PessoaTest extends PHPUnit_Framework_TestCase{

	protected $pessoaTeste;

	protected function setUp(){
		$this->pessoaTeste = new Pessoa('Lucas', 123456789, 'Vicente Pires', 85004565);
	}

	protected function tearDown(){
		unset($this->pessoaTeste);
	}

	public function testeConstrutor(){
		$this->assertNotNull($this->pessoaTeste);
	}

	public function testeGetNome(){
		$this->assertEquals('Lucas', $this->pessoaTeste->getNome());
	}

	public function testeSetNome(){
		$nome = 'Maria';
		$this->pessoaTeste->setNome($nome);
		$this->assertEquals($nome, $this->pessoaTeste->getNome());
	}

	public function testeGetCpf(){
		$this->assertEquals('123456789', $this->pessoaTeste->getCpf());
	}

	public function testeSetCpf(){
		$cpf = 111111111;
		$this->pessoaTeste->setCpf($cpf);
		$this->assertEquals($cpf, $this->pessoaTeste->getCpf());
	}

	public function testeGetEndereco(){
		$this->assertEquals('Vicente Pires', $this->pessoaTeste->getEndereco());
	}

	public function testeSetendereco(){
		$endereco = 'Gama';
		$this->pessoaTeste->setEndereco($endereco);
		$this->assertEquals($endereco, $this->pessoaTeste->getEndereco());
	}

	public function testeGetTelefone(){
		$this->assertEquals(85004565, $this->pessoaTeste->getTelefone());
	}

	public function testeSetTelefone(){
		$telefone = 88888888;
		$this->pessoaTeste->setTelefone($telefone);
		$this->assertEquals($telefone, $this->pessoaTeste->getTelefone());
	}
}

?>

