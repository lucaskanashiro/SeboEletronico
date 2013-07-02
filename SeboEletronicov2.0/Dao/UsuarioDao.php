<?php
//include "StringDeConexaoComBancoDeDados.php";
class UsuarioDao {
   
    public function salvaUsuario($usuario){
        
        $sql="INSERT INTO senha (codigo_senha) VALUES ('".$usuario::getSenha()."')";
        pg_query(StringDeConexaoComBancoDeDados::$dbcon, $sql);

        $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$usuario::getSenha()."'";
        $resultado = $id_senha = pg_query(StringDeConexaoComBancoDeDados::$dbcon, $sql2);
        $id_senha = pg_fetch_array($resultado);

        $sql3="INSERT INTO usuario (nome, email, telefone, senha_id) VALUES ('".$usuario::getNome()."', 
            '".$usuario::getEmail()."', '".$usuario::getTelefone()."','".$id_senha['id_senha']."')";
        pg_query(StringDeConexaoComBancoDeDados::$dbcon, $sql3);
    }
    
    public function alteraUsuario($usuario, $idDoUsuario){
        
        $sql="UPDATE usuario SET email = '".$usuario::getEmail()."', nome = '".$usuario::getNome()."',telefone = '".$usuario::getTelefone()."'
            WHERE id_pessoa = '".$idDoUsuario."'";
        pg_query(StringDeConexaoComBancoDeDados::$dbcon, $sql);


        $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$usuario::getSenha()."'";
        $resultado = $id_senha = pg_query(StringDeConexaoComBancoDeDados::$dbcon, $sql2);
        $id_senha = pg_fetch_array($resultado);


        $sql3="INSERT INTO usuario (nome, email, telefone, senha_id) VALUES ('".$usuario::getNome()."', '".$usuario::getEmail()."', '".$usuario::getTelefone()."','".$id_senha['id_senha']."')";
        pg_query(StringDeConexaoComBancoDeDados::$dbcon, $sql3);
    }

    public function pesquisaUsuario($usuario){
        
    }
    
    public function deletaUsuario($email, $senha){
        
        $sql="DELETE FROM usuario WHERE email = '".$email."'";
        pg_query(StringDeConexaoComBancoDeDados::$dbcon, $sql);

        $sql1="DELETE FROM senha WHERE codigo_senha = '".$senha."'";
        pg_query(StringDeConexaoComBancoDeDados::$dbcon, $sql1);
        
    }

    public static function checaCadastro($email, $senha){
        
        $sql="SELECT * FROM usuario WHERE email = '".$email."'";
        $emailBuscado= pg_query(StringDeConexaoComBancoDeDados::$dbcon, $sql);
        $resultado = pg_fetch_array($emailBuscado);
        
        $sql2="SELECT * FROM senha WHERE codigo_senha = '".$senha."'";
        $codigoDaSenhaBuscado = pg_query(StringDeConexaoComBancoDeDados::$dbcon, $sql2);
        $resultado1 = pg_fetch_array($codigoDaSenhaBuscado);
        
       if($resultado['senha_id'] == $resultado1['id_senha']){
           return $resultado;
       }
    }
    
}

?>
