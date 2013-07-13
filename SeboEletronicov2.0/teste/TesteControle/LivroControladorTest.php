<?php

require_once "../SeboEletronico/SeboEletronicov2.0/Controle/LivroControlador.php";

class LivroControladorTest extends PHPUnit_Framework_TestCase{

	protected $control;

	protected function setUp(){
		$this->control = new LivroControlador();
	}

	protected function tearDown(){
		unset($this->control);
	}
}

?>

