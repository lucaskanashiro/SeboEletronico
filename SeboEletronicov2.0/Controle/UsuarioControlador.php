<?php

include '../Modelo/Usuario.php';

class UsuarioControlador {
    
    
        public function salvaUsuario($nome, $email, $telefone, $senha){
            try{
                $usuario = new Usuario($nome, $telefone, $email, $senha);
            }catch(Exception $e){
                print"<script>alert('".$e->getMessage()."')</script>";
                echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/cadastrarUsuario.php'; </script>";
                exit;    
            }
           return UsuarioDao::salvaUsuario($usuario);
        }

        public function checaCadastroId($id){
            return UsuarioDao::getCadastradosPorId($id);
        }

        public function alterarCadastro($nome, $email, $telefone, $senha, $id, $senhaVelha){
            try{
                
                $usuario = new Usuario($nome, $telefone, $email, $senha);
            }catch(Exception $e){
                print"<script>alert('".$e->getMessage()."')</script>";
                echo "<script>window.location='http://localhost/SeboEletronicov2.0/Visao/alteraUsuario.php'; </script>";
                exit;    
            }
           return UsuarioDao::alteraUsuario($usuario,$id, $senhaVelha);
        
        }
        
        public function deletaCadastro($email, $senha){
   
            return UsuarioDao::deletaUsuario($email, $senha);
   
        }

        public function pesquisaUsuario($nome){
            return UsuarioDao::pesquisaUsuario($nome);
        } 
}

?>
