<?php

include "../Utilidades/ConexaoComBanco.php";

class UsuarioDao {

    public function salvaUsuario($usuario){
        $senhaAux = $usuario->getSenha();
        $senhaFinal = $senhaAux[0];
         
        $sql="INSERT INTO senha (codigo_senha) VALUES ('".$senhaFinal."')";
        mysql_query($sql);

        $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$senhaFinal."'";
        $resultado = $id_senha = mysql_query($sql2);
        $id_senha = mysql_fetch_array($resultado);

        $sql3="INSERT INTO usuario (nome_usuario, email_usuario, telefone_usuario, senha_usuario) VALUES ('".$usuario->getNome()."', '".$usuario->getEmail()."', 
            '".$usuario->getTelefone()."','".$id_senha['id_senha']."')";
        $usuarioRetorno = mysql_query($sql3);
        
        return $usuarioRetorno;
    }
    
    public function alteraUsuario($usuario, $idDoUsuario,$senhaVelha){

        $senhaAux = $usuario->getSenha();
        $senhaAlterar = $senhaAux[0];
                
        $sql="UPDATE usuario SET nome_usuario = '".$usuario->getNome()."' , telefone_usuario = '".$usuario->getTelefone()."', 
            email_usuario = '".$usuario->getEmail()."' WHERE id_usuario = '".$idDoUsuario."'";
        $usuario = mysql_query($sql);
        
        if($senhaAlterar != $senhaVelha){
            
            $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$senhaVelha."'";
            $resultado = mysql_query($sql2);
            $id_senha = mysql_fetch_row($resultado);
            
            $sql3="Update senha SET codigo_senha = '".$senhaAlterar."' WHERE id_senha = '".$id_senha[0]."'";
            $senhaSalva = mysql_query($sql3);
        }
        
        return ($usuario && $senhaSalva);
    }

    public function pesquisaUsuario($usuario){
        
        $sql="SELECT * FROM usuario WHERE nome_usuario = '".$usuario."'";
        $resultado=mysql_query($sql);
        $user = mysql_fetch_row($resultado);
       
        return $user;
    }
    
    public function deletaUsuario($email, $senha){
                
        $sql="DELETE FROM usuario WHERE email_usuario = '".$email."'";
        $deletouUsuario = mysql_query($sql);

        $sql1="DELETE FROM senha WHERE codigo_senha = '".$senha."'";
        $deleteouSenha = mysql_query($sql1);
        
        return ($deletouUsuario&&$deleteouSenha);
        
    }

//    public function checaCadastro($email, $senha){
//        
//        $sql= "SELECT * FROM usuario WHERE email_usuario = '".$email."'";
//        $emailBuscado = mysql_query($sql);
//        
//        $resultado = mysql_fetch_row($emailBuscado);
//        
//        $sql2="SELECT * FROM senha WHERE codigo_senha = '".$senha."'";
//        $codigoDaSenhaBuscado = mysql_query($sql2);
//        $resultado1 = mysql_fetch_row($codigoDaSenhaBuscado);
//        
//       if($resultado['senha_usuario'] == $resultado1['id_senha']){
//           return $resultado;
//       }
//    }
//    
    public function getCadastradosPorId($idPessoa){
        
        $sql="SELECT * FROM usuario WHERE id_usuario = '".$idPessoa."'";
        $resultado = mysql_query($sql);
        
        $res = mysql_fetch_array($resultado);

        return $res;
        }
        
//    public function getSenhaPorId($idSenha){
//            $sql="SELECT codigo_senha FROM senha WHERE id_senha = '".$idSenha."'";
//            $resultado = mysql_query($sql);
//            $res = mysql_fetch_array($resultado);
//            
//            return $res;
//        }    
}

?>
