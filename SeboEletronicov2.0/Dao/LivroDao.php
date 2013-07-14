<?php

include "../Utilidades/ConexaoComBanco.php";

class LivroDao {
    
    public function salvaLivro($titulo, $autor, $editora, $edicao, $venda, $troca, $genero, $estado,$descricao, $id_dono){
        echo "chegou nesta maldita classe";
        echo "</br>";
        
        
        $sql="INSERT INTO livro (titulo_livro, autor, editora, edicao, genero, estado_conserv, id_dono, venda, troca,descricao) VALUES ('".$titulo."', '".$autor."', '".$editora."','".$edicao."','".$genero."','".$estado."','".$id_dono."', '".$venda."', '".$troca."', '".$descricao."')";
        mysql_query($sql);
        
        var_dump(mysql_query($sql));
        echo "</br>";
        echo "tralala";
      exit;  
    }

    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){

        if(empty($disponibilidadeTroca) && !empty($disponibilidadeVenda)){
            if(empty($estadoNovo) && !empty($estadoUsado)){
                $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."' AND estado_conserv = '".$estadoUsado."' 
            AND tipo_operacao = '".$disponibilidadeVenda."'";
            }elseif (!empty($estadoNovo) && empty($estadoUsado)) {
                $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."' AND estado_conserv = '".$estadoNovo."' 
            AND tipo_operacao = '".$disponibilidadeVenda."'";
            }
        }  else if(!empty($disponibilidadeTroca) && empty($disponibilidadeVenda)){
            if(empty($estadoNovo) && !empty($estadoUsado)){
                $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."' AND estado_conserv = '".$estadoUsado."' 
            AND tipo_operacao = '".$disponibilidadeTroca."'";
            }elseif (!empty($estadoNovo) && empty($estadoUsado)) {
                $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."' AND estado_conserv = '".$estadoNovo."' 
            AND tipo_operacao = '".$disponibilidadeTroca."'";
            }
        } else{
            $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."'";
        }
            
        $lista = mysql_query($sql);
        $listaLivros = mysql_fetch_array($lista);
        
        return $listaLivros;
        
    }
    
    public function getLivroById($id){
        $sql = "SELECT * FROM livro WHERE id_livro = '".$id."'";
        $result = mysql_query($sql);
        return mysql_fetch_array($result);
    }

    public function deletaLivro($titulo){
        $sql = "DELETE FROM livro WHERE titulo_livro = '".$titulo."'";
        $deletou = mysql_query($sql);
        return $deletou;
    }
    
    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id){
        $sql = "UPDATE livro SET titulo_livro = '".$titulo."' AND autor = '".$autor."'
             AND genero = '".$genero."' AND edicao = '".$edicao."' AND editora = '".$editora."'AND venda = '".$venda."'
             AND troca = '".$troca."' AND estado_conserv = '".$estado."' AND descricao = '".$descricao."' WHERE id_livro = '".$id."'";
        $livro = mysql_query($sql);
        
        if($livro){
            return 1;
        }else{
            return 0;
        }
    }   
}
?>

