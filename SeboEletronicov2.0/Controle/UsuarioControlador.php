<?php

class UsuarioControlador {
    
    public function salvaUsuario(){
            
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            
            $usuario = new Usuario($nome, $email, $telefone, $senha);
            UsuarioDao::salvaUsuario($usuario);
        }
        
       public function checaCadastro(){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            
            $resultado = Usuario::checaCadastro($email, $senha);
            $id_pessoa = $resultado[0]['id_pessoa'];
            
            ?>
            <script language = "Javascript">
            window.location="ARRUMAR CAMINHO    /index.php/usuario/altera?idPessoa=<?php echo $id_pessoa?>";
            </script><?php
        }
        
        public function checaCadastroId($id){
            return Usuario::getCadastradosPorId($id);
        }
        
        public function checaSenhaId($idSenha){
            return Usuario::getSenhaPorId($idSenha);
        }


        public function alterarCadastro(){
            
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $senha = $_POST['senha'];
            $id = $_POST['id_pessoa'];
        
            $usuarioAlterado = new Usuario($nome, $email, $telefone, $senha);
            UsuarioDao::alteraUsuario($usuarioAlterado ,$id);
        
        }
        
        public function deletaCadastro(){
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            Usuario::Deletar($email, $senha);
          
        }


        public function listaCadastros(){
            return Usuario::getCadastrados();
        }
    
}

?>
