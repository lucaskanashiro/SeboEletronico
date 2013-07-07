<?php
include "../Utilidades/ConexaoComBanco.php";
class UsuarioDao {

    public static function salvaUsuario($nome, $email, $telefone, $senha){
        
        $usuario = new Usuario($nome, $email, $telefone, $senha);
        
        $senhaFinal = $usuario->getSenha();
        $senhaSalvar = $senhaFinal[0];
         
        $sql="INSERT INTO senha (codigo_senha) VALUES ('".$senhaSalvar."')";
        pg_query(conectaBanco(), $sql);

        $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$senhaSalvar."'";
        $resultado = $id_senha = pg_query(conectaBanco(), $sql2);
        $id_senha = pg_fetch_array($resultado);

        $sql3="INSERT INTO usuario (nome, email, telefone, senha_id) VALUES ('".$usuario->getNome()."', 
            '".$usuario->getEmail()."', '".$usuario->getTelefone()."','".$id_senha['id_senha']."')";
        pg_query(conectaBanco(), $sql3);
    }
    
    public function alteraUsuario($nome, $email, $telefone, $senha, $idDoUsuario){
        
        $usuario = new Usuario($nome, $email, $telefone, $senha);

        $senhaFinal = $usuario->getSenha();
        $senhaAlterar = $senhaFinal[0];
        
        
        $sql="UPDATE usuario SET email = '".$usuario->getEmail()."', nome = '".$usuario->getNome()."',telefone = '".$usuario->getTelefone()."'
            WHERE id_pessoa = '".$idDoUsuario."'";
        pg_query(conectaBanco(), $sql);


        $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$senhaAlterar."'";
        $resultado = $id_senha = pg_query(conectaBanco(), $sql2);
        $id_senha = pg_fetch_array($resultado);


//        $sql3="INSERT INTO usuario (nome, email, telefone, senha_id) VALUES ('".$usuario->getNome()."', '".$usuario->getEmail()."', '".$usuario::getTelefone()."','".$id_senha['id_senha']."')";
//        pg_query(conectaBanco(), $sql3);
    }

    public function pesquisaUsuario($usuario){
        
    }
    
    public function deletaUsuario($email, $senha){
                
        $sql="DELETE FROM usuario WHERE email = '".$email."'";
        pg_query(conectaBanco(), $sql);

        $sql1="DELETE FROM senha WHERE codigo_senha = '".$senha."'";
        pg_query(conectaBanco(), $sql1);
        
    }

    public static function checaCadastro($email, $senha){
        
        $sql="SELECT * FROM usuario WHERE email = '".$email."'";
        $emailBuscado= pg_query(conectaBanco(), $sql);
        $resultado = pg_fetch_array($emailBuscado);
        var_dump($resultado);
        exit;
        
        $sql2="SELECT * FROM senha WHERE codigo_senha = '".$senha."'";
        $codigoDaSenhaBuscado = pg_query(conectaBanco(), $sql2);
        $resultado1 = pg_fetch_array($codigoDaSenhaBuscado);
        
       if($resultado['senha_id'] == $resultado1['id_senha']){
           return $resultado;
       }
    }
    
    public static function getCadastradosPorId($idPessoa){
         
        $sql="SELECT * FROM usuario WHERE id_pessoa = '".$idPessoa."'";
        $resultado = $id_senha = pg_query(conectaBanco(), $sql);
        $res = pg_fetch_array($resultado);

        return $res;
        }
        
    public static function getSenhaPorId($idSenha){
            $sql="SELECT codigo_senha FROM senha WHERE id_senha = '".$idSenha."'";
            $resultado = $id_senha = pg_query(conectaBanco(), $sql);
            $res = pg_fetch_array($resultado);
            
            return $res;
        }    
}

?>
