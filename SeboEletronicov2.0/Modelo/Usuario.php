<?php

include '../Utilidades/ValidaDados.php';
include '../Utilidades/ExcessaoNomeInvalido.php';
include '../Utilidades/ExcessaoTelefoneInvalido.php';
include '../Utilidades/ExcessaoEmailInvalido.php';
include '../Utilidades/ExcessaoSenhaInvalida.php';
include '../Dao/UsuarioDao.php';

class Usuario {
    
    private $nome;
    private $telefone;
    private $email;
    private $senha;
    
    public function __construct($nome, $telefone, $email, $senha) {
        $this->setNome($nome);
        $this->setTelefone($telefone);
        $this->setEmail($email);
        $this->setSenha($senha);
    }
 
    public function getNome() {
        return $this->nome;
    }
        
    public function setNome($nome){
        
        if(!ValidaDados::validaCamposNulos($nome)){
            throw new ExcessaoNomeInvalido("Nome nao pode ser nulo!");
        }elseif(ValidaDados::validaNome($nome) == 1){
            throw new ExcessaoNomeInvalido("Nome contem caracteres invalidos!");
        }elseif(ValidaDados::validaNome($nome) == 2){
            throw new ExcessaoNomeInvalido("Nome contem espaços seguidos!");
        }else{
            $this->nome = $nome;
        }
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        if(!ValidaDados::validaCamposNulos($telefone)){
            throw new ExcessaoTelefoneInvalido("Telefone nao pode ser nulo!");
        }elseif(ValidaDados::validaTelefone($telefone) == 1){
            throw new ExcessaoTelefoneInvalido("Telefone nao pode conter caracteres alfabeticos!");
        }elseif(ValidaDados::validaTelefone($telefone) == 2){
            throw new ExcessaoTelefoneInvalido("Telefone deve conter exatamente oito (8) digitos!");
        }else{
            $this->telefone = $telefone;
        }
    }

    public function getEmail() {
	return $this->email;
	//$email = "caiquepereira@gmail.com";
	//return $email ;
}

    public function setEmail($email) {
        if(!ValidaDados::validaCamposNulos($email)){
            throw new ExcessaoEmailInvalido("E-mail nao pode ser nulo!");
        }elseif(ValidaDados::validaEmail($email) == 1){
            throw new ExcessaoEmailInvalido("E-mail nao válido!");
        }else{
            $this->email = $email;
        }
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $auxiliar = ValidaDados::validaSenha($senha);
        
        if(!ValidaDados::validaSenhaNula($senha)){
            throw new ExcessaoSenhaInvalida("Senha nao pode ser nula!");
        }elseif($auxiliar == 1){
            throw new ExcessaoSenhaInvalida("Senha contem caracteres invalidos!");
        }elseif($auxiliar == 2){
            throw new ExcessaoSenhaInvalida("Senha deve conter exatamente seis (6) digitos!");
        }elseif($auxiliar == 3){
            throw new ExcessaoSenhaInvalida("Senha e confirmação estão diferentes!");
        }else{
            $this->senha = $senha;
        } 
    }
    
//    public function checaCadastro($email, $senha){
//        return UsuarioDao::checaCadastro($email, $senha);
//    }
//    
//    public function checaCadastroId($id){
//        return UsuarioDao::getCadastradosPorId($id);
//    }
//    
//    public function checaSenhaId($idSenha){
//        return UsuarioDao::getSenhaPorId($idSenha);
//    }
//
//    public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
//        $usuario = new Usuario($nome, $telefone, $email, $senha);
//        return UsuarioDao::alteraUsuario($usuario->getNome(), $usuario->getEmail(), $usuario->getTelefone(), $usuario->getSenha(),$id,$senhaVelha);
//    }
//
//    public function deletaCadastro($email, $senha){
//        return UsuarioDao::deletaUsuario($email, $senha);
//    }
//
//    public function pesquisaUsuario($nome){
//        return UsuarioDao::pesquisaUsuario($nome);
//    }
}

?>
