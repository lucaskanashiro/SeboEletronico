<?php
include "../Utilidades/ConexaoComBanco.php";
class LivroDao {
    
    
    public function salvaLivro($titulo, $autor, $editora, $edicao, $operacao1, $operacao2, $classificacao, $estado){

        $livro = new Livro($titulo, $autor, $classificacao, $edicao, $editora, $operacao1, $operacao2, $estado);

        $sql2="INSERT INTO livro (titulo_livro, autor, editora, edicao, genero, 
        estado_conserv, id_dono, venda, troca) VALUES ('".$livro->getTitulo()."', '".$livro->getAutor()."',
        '".$livro->getEditora()."','".$livro->getEdicao()."','".$livro->getGenero()."','".$livro->getEstado()."',
            '3', '".$livro->getVenda()."', '".$livro->getTroca()."')";
        mysql_query($sql2);
        //BUSCAR O ID DO DONO PARA GUARDAR NO BANCO
    }
    
    
    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){
        
       /* if(!empty($titulo) && !empty($estadoNovo) && !empty($disponibilidadeTroca)){
            $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."' AND estado_conserv = '".$estadoNovo."' 
            AND tipo_operacao = '".$disponibilidadeTroca."'";
        }elseif(!empty($titulo) && !empty($estadoUsado) && !empty($disponibilidadeTroca)){
            $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."' AND estado_conserv = '".$estadoUsado."'
            AND tipo_operacao = '".$disponibilidadeTroca."'";
        }elseif(!empty($titulo) && !empty($estadoNovo) && !empty($disponibilidadeVenda)){
            $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."' AND estado_conserv = '".$estadoNovo."' 
            AND tipo_operacao = '".$disponibilidadeVenda."'";
        }elseif(!empty($titulo) && !empty($estadoUsado) && !empty($disponibilidadeVenda)){
            $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."' AND estado_conserv = '".$estadoUsado."'
            AND tipo_operacao = '".$disponibilidadeVenda."'";
        }*/
        
        $sql = "SELECT * FROM livro WHERE titulo_livro = '".$titulo."'";
        
        $lista = mysql_query($sql);
        $listaLivros = mysql_fetch_array($lista);
            
        
        return $listaLivros;
        //CONCLUIR A BUSCA NO BANCO
        //DEPOIS DE BUSCAR NO BANCO EH SOH JOGAR O RESULTADO NA PAGINA LISTADELIVROS.PHP
        
        /*
         * $resultado = pg_query(conectaBanco(), $sql1);
         * $id_livro = pg_fetch_array($resultado);
         * "SELECT * FROM senha WHERE codigo_senha = '".$senha."'"
         * $resultado = $id_senha = pg_query(conectaBanco(), $sql2);
         * $id_senha = pg_fetch_array($resultado); 
         * 
         * "SELECT id_senha FROM senha WHERE codigo_senha='".$senhaSalvar."'";
         */
        
    }
    
    public function getLivroById($id){
        $sql = "SELECT * FROM livro WHERE id_livro = '".$id."'";
        $result = mysql_query($sql);
        return mysql_fetch_array($result);
    }

    public function deletaLivro($titulo){
        $sql = "DELETE FROM livro WHERE titulo_livro = '".$titulo."'";
        mysql_query($sql);
        
    }
}

?>

