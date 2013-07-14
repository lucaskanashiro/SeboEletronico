<?php

include "../Utilidades/ConexaoComBanco.php";

class LivroDao {
    
    public function salvaLivro($titulo, $autor, $editora, $edicao, $venda, $troca, $genero, $estado,$descricao, $id_dono){
        
        $sql = "INSERT INTO livro (id_dono, titulo_livro, editora, autor, edicao, genero, estado_conserv, descricao_livro, venda, troca)
            VALUES ('".$id_dono."','".$titulo."','".$editora."','".$autor."','".$edicao."','".$genero."','".$estado."','".$descricao."','".$venda."','".$troca."')";
        $livro = mysql_query($sql);
          return $livro;
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
        var_dump($id);
        exit;
        
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

