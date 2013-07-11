<?php

    include '../Dao/UsuarioDao.php';
    include '../Modelo/Usuario.php';
class UsuarioControlador {
    
    
        public function salvaUsuario($nome, $email, $telefone, $senha){
           
            UsuarioDao::salvaUsuario($nome, $email, $telefone, $senha);
            
        }
        
        public function checaCadastro($email, $senha){
            
            $resultado = UsuarioDao::checaCadastro($email, $senha);
            
            $id_pessoa = $resultado[0];
            
            ?>
            <script language = "Javascript">
            window.location="http://localhost/SeboEletronicov2.0/Visao/alteraUsuario.php?idPessoa=<?php echo $id_pessoa?>";
            </script><?php
        }
        
        public function checaCadastroId($id){
            return UsuarioDao::getCadastradosPorId($id);
        }
        
        public function checaSenhaId($idSenha){
            return UsuarioDao::getSenhaPorId($idSenha);
        }


        public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
            
            UsuarioDao::alteraUsuario($nome, $email, $telefone, $senha,$id, $senhaVelha);
        
        }
        
        public function deletaCadastro($email, $senha){
   
            UsuarioDao::DeletaUsuario($email, $senha);
   
        }


        public function pesquisaUsuario($nome){
            return UsuarioDao::pesquisaUsuario($nome);
        }
    
}

?>
