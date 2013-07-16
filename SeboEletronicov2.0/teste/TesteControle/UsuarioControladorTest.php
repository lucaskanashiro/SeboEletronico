<?php

require_once "../../Modelo/Usuario.php";
require_once "../../Controle/UsuarioControlador.php";
require_once "../../Dao/UsuarioDao.php";
require_once "../../Utilidades/ValidaDados.php";
require_once "../../Utilidades/ExcessaoNomeInvalido.php";
require_once "../../Utilidades/ExcessaoSenhaInvalida.php";
require_once "../../Utilidades/ExcessaoTelefoneInvalido.php";
require_once "../../Utilidades/ExcessaoEmailInvalido.php";
require_once "../../Utilidades/ConexaoComBanco.php";

class UsuarioControladorTest extends PHPUnit_Framework_TestCase {

    protected $usuarioControladorTest;
    protected $usuario;
    
    protected function setUp() {
        $senha = array(123123,123123);
        $this->usuario = new Usuario('lucas', 98989898, 'lucas@lucas.com', $senha);
        $this->usuarioControladorTest = new UsuarioControlador();
    }

    protected function tearDown() {
        unset($this->usuarioControladorTest);
        unset($this->usuario);
    }

    public function testSalvaUsuario() {
        $senha = array(123123,123123);
        $retorno = $this->usuarioControladorTest->salvaUsuario('lucas', 98989898, 'lucas@lucas.com', $senha);
        $this->assertTrue($retorno);
    }
    
//    public function testChecaCadastroId(){
//            
//    }
//    
//    public function testAlteraUsuario(){
//        $retorno = $this->usuarioControladorTest->alteraUsuario($this->usuario, 11, 123456);
//        $this->assertTrue($retorno);
//    }
//    
//    public function testPesquisaUsuario(){
//        $retorno = $this->usuarioControladorTest->pesquisaUsuario(null);
//        $this->assertFalse($retorno);
//    }
//    
//    public function testDeletaUsuario(){
//        $senha = $this->usuario->getSenha();
//        $retorno = $this->usuarioControladorTest->deletaUsuario($this->usuario->getEmail(), $senha[0]);
//        $this->assertTrue($retorno);
//    }
//    
//    public function testGetCadastradosPorIdComIdNulo(){
//        $retorno = $this->usuarioControladorTest->getCadastradosPorId(null);
//        $this->assertFalse($retorno);
//    }
//    
//    public function testGetCadastradosPorIdComIdInvalido(){
//        $retorno = $this->usuarioControladorTest->getCadastradosPorId(-2);
//        $this->assertFalse($retorno);
//    }
//    
//    public function testGetCadastradosPorIdComIdValido(){
//        $senha = $this->usuario->getSenha();
//        $retorno = $this->usuarioControladorTest->getCadastradosPorId(23);
//        $this->assertEquals($this->usuario->getEmail(), $retorno[4]);
//        $this->assertEquals($this->usuario->getNome(), $retorno[1]);
//        $this->assertEquals($this->usuario->getTelefone(), $retorno[3]);
//
//    }

}

