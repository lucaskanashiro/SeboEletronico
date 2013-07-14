<?php
include "../Utilidades/ConexaoComBanco.php";
class LivroDao {
    
    
    public function salvaLivro($titulo, $autor, $editora, $edicao, $venda, $troca, $classificacao, $estado){

        $livro = new Livro($titulo, $autor, $classificacao, $edicao, $editora, $venda, $troca, $estado);

        $sql2="INSERT INTO livro (titulo_livro, autor, editora, edicao, genero, 
        estado_conserv, id_dono, venda, troca) VALUES ('".$livro->getTitulo()."', '".$livro->getAutor()."',
        '".$livro->getEditora()."','".$livro->getEdicao()."','".$livro->getGenero()."','".$livro->getEstado()."',
            '3', '".$livro->getVenda()."', '".$livro->getTroca()."')";
        $salvo = mysql_query($sql2);
        return $salvo;
        //BUSCAR O ID DO DONO PARA GUARDAR NO BANCO
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
        } else {
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
}

?>

