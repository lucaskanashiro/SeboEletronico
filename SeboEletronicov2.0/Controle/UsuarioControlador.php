<?php

  
    include '../Modelo/Usuario.php';
class UsuarioControlador {
    
    
        public function salvaUsuario($nome, $email, $telefone, $senha){
           
           return Usuario::salvaUsuario($nome, $email, $telefone, $senha);
            
        }
        
        public function checaCadastro($email, $senha){
            
            $resultado = Usuario::checaCadastro($email, $senha);
            
            $id_pessoa = $resultado[0];
            
            ?>
            <script language = "Javascript">
            window.location="http://localhost/SeboEletronicov2.0/Visao/alteraUsuario.php?idPessoa=<?php echo $id_pessoa?>";
            </script><?php
        }
        
        public function checaCadastroId($id){
            return Usuario::getCadastradosPorId($id);
        }
        
        public function checaSenhaId($idSenha){
            return Usuario::checaSenhaId($idSenha);
        }


        public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
            
           return Usuario::alteraUsuario($nome, $email, $telefone, $senha,$id, $senhaVelha);
        
        }
        
        public function deletaCadastro($email, $senha){
   
            return Usuario::DeletaUsuario($email, $senha);
   
        }

        public function pesquisaUsuario($nome){
            return Usuario::pesquisaUsuario($nome);
        }
        
}

?>
