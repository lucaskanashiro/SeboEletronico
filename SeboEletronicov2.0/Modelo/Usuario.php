<?php
include '../Utilidades/ValidaDados.php';
class Usuario {
    
    private $nome;
    private $telefone;
    private $email;
    private $senha;
    
    public function __construct($nome, $telefone, $email, $senha) {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->senha = $senha;
        
    }

    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome){
        if(!ValidaDados::validaCamposNulos($nome)){
            throw new ExcessaoNomeInvalido("Nome nao pode ser nulo!");
        }elseif(!ValidaDados::validaNome($nome)){
            throw new ExcessaoNomeInvalido("Nome contem caracteres invalidos!");
        }else{
            $this->nome = $nome;
        }
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function setTelefone($telefone) {
        if(!ValidaDados::validaTelefone($telefone)){
            throw new ExcessaoTelefoneInvalido("Telefone nao pode conter caracteres alfabeticos!");
        }elseif(!ValidaDados::validaCamposNulos($telefone)){
            throw new ExcessaoTelefoneInvalido("Telefone nao pode ser nulo!");
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
            throw new ExcessaoEmailInvalido("E-mail nao válido!");
        }elseif(!ValidaDados::validaCamposNulos($email)){
            throw new ExcessaoEmailInvalido("E-mail nao pode ser nulo!");
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
            throw new ExcessaoSenhaInvalida("Senha contem caracteres invalidos!");
        }elseif($auxiliar == 2){
            throw new ExcessaoSenhaInvalida("Senha possui mais de seis (6) digitos!");
        }elseif($auxiliar == 3){
            throw new ExcessaoSenhaInvalida("Senha e confirmação estão diferentes!");
        }elseif(!ValidaDados::validaCamposNulos($senha)){
            throw new ExcessaoSenhaInvalida("Senha nao pode ser nula!");
        }else{
            $this->senha = $senha;
        } 
    }
}

?>
