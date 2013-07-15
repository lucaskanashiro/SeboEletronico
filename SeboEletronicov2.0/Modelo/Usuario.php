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
            throw new Exception("Nome nao pode ser nulo!");
        }if(!ValidaDados::validaNome($nome)){
            throw new Exception("Nome contem caracteres invalidos!");
        }else{
            $this->nome = $nome;
        }
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        if(!ValidaDados::validaTelefone($telefone)){
            throw new Exception("Telefone nao pode conter caracteres alfabeticos!");
        }elseif(!ValidaDados::validaCamposNulos($telefone)){
            throw new Exception("Telefone nao pode ser nulo!");
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
        
        if(!ValidaDados::validaEmail($email)){
            throw new Exception("E-mail nao válido!");
        }elseif(!ValidaDados::validaCamposNulos($email)){
            throw new Exception("E-mail nao pode ser nulo!");
        }else{
            $this->email = $email;
        }
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $auxiliar = ValidaDados::validaSenha($senha);
        
        if($auxiliar == 1){
            throw new Exception("Senha contem caracteres invalidos!");
        }elseif($auxiliar == 2){
            throw new Exception("Senha possui mais de seis (6) digitos!");
        }elseif($auxiliar == 3){
            throw new Exception("Senha e confirmação estão diferentes!");
        }elseif(!ValidaDados::validaCamposNulos($senha)){
            throw new Exception("Senha nao pode ser nula!");
        }else{
            $this->senha = $senha;
        } 
    }
    
    public function salvaUsuario($nome, $email, $telefone, $senha){
               
        try{
            $usuario = new Usuario($nome, $telefone, $email, $senha);
        }catch(Exception $e){
            print"<script>alert('".$e->getMessage()."')</script>";
            ?>
                <script language = "Javascript">
                    window.location="http://localhost/SeboEletronicov2.0/Visao/cadastrarUsuario.php";
                </script>
            <?php 
            exit;    
        }
        return UsuarioDao::salvaUsuario($usuario->getNome(), $usuario->getEmail(), $usuario->getTelefone(), $usuario->getSenha());   
    }
    
    public function checaCadastro($email, $senha){
        return UsuarioDao::checaCadastro($email, $senha);
    }
    
    public function checaCadastroId($id){
        return UsuarioDao::getCadastradosPorId($id);
    }
    
     public function checaSenhaId($idSenha){
         return UsuarioDao::getSenhaPorId($idSenha);
     }
     
     public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
         $usuario = new Usuario($nome, $telefone, $email, $senha);
         return UsuarioDao::alteraUsuario($usuario->getNome(), $usuario->getEmail(), $usuario->getTelefone(), $usuario->getSenha(),$id,$senhaVelha);
     }
     
     public function deletaCadastro($email, $senha){
         return UsuarioDao::deletaUsuario($email, $senha);
     }
     
     public function pesquisaUsuario($nome){
         return UsuarioDao::pesquisaUsuario($nome);
     }
}

?>
