<?php

include "../Utilidades/ConexaoComBanco.php";

class LivroDao {
    
    public function salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono){

        $sql = "INSERT INTO livro (id_dono, titulo_livro, editora, autor, edicao, genero, estado_conserv, descricao_livro, venda, troca)
            VALUES ('".$id_dono."','".$titulo."','".$editora."','".$autor."','".$edicao."','".$genero."','".$estado."','".$descricao."',
                '".$venda."','".$troca."')";
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
    
    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id, $id_usuario){
        //echo "livrodao</br>";
        //var_dump($genero);
        //var_dump($id_usuario);
        //var_dump($id);
        //exit;
        
        //$sql = "UPDATE livro SET id_dono = '".$id_usuario."', titulo_livro = '".$titulo."', autor = '".$autor."', genero = '".$genero."', edicao = '".$edicao."', 
        //   editora = '".$editora."', venda = '".$venda."', troca = '".$troca."', estado_conserv = '".$estado."', descricao = '".$descricao."' 
        //        WHERE id_livro = '".$id."'";
        $sql = "UPDATE livro SET id_dono = '".$id_usuario."', titulo_livro = '".$titulo."', editora = '".$editora."', autor = '".$autor."', edicao = '".$edicao."', genero = '".$genero."', estado_conserv = '".$estado."', descricao_livro = '".$descricao."', venda = '".$venda."', troca = '".$troca."' WHERE id_livro = '".$id."'";
        $livro = mysql_query($sql);
        
        if($livro){
            return 1;
        }else{
            return 0;
        }
    }   
}
?>

