<?php

require_once "../SeboEletronico/SeboEletronicov2.0/Controle/LivroControlador.php";

class LivroControladorTest extends PHPUnit_Framework_TestCase{

	protected $livroControlador;

	protected function setUp(){
		$this->livroControlador = new LivroControlador();
	}

	protected function tearDown(){
		unset($this->livroControlador);
	}

        public function salvaLivroTeste (){
            $retorno= $this->livroControlador->salvaLivro('calculo 1', 'Thomas', 'engenharia', 2, 'editora teste', 'venda', 'troca', 'novo');
            $this->assertTrue($retorno);
            
        }
        
        public function pesquisaLivroTeste(){
           
          $retorno = $this->livroControlador->pesquisaLivro('Calculo 1', 'novo', 'usado', 'venda', 'troca');
            
            if($retorno===false){
                $this->assertFalse($retorno);
            }  else {
                $this->assertNotEmpty($retorno);
            }
            
        }
        
        public function getLivroByIdTeste(){
            $retorno = $this->livroControlador->getLivroById('1');
            
            if($retorno===false){
                $this->assertFalse($retorno);
            }  else {
                $this->assertNotEmpty($retorno);
            }
        }
     
        public function deletaLivroTeste(){
            $retorno=  $this->livroControlador->deletaLivro();
            $this->assertTrue($retorno);
            
        }
          
}

?>

