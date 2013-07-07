<?php

class LivroDao {
    
    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){
        
        if(!empty($titulo) && !empty($estadoNovo) && !empty($disponibilidadeTroca)){
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
        }
        
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
    
    public function salvaLivro($titulo, $autor, $editora, $edicao, $tipoDeOperacao, $genero, $estado){
        
        $livro = new Livro($titulo, $autor, $editora, $edicao, $tipoDeOperacao, $genero, $estado);
        
        $sql2="INSERT INTO livro (titulo_livro, autor, editora, edicao, tipo_Operacao,genero, 
        estado_conserv, id_dono) VALUES ('".$livro->getTitulo()."', '".$livro->getAutor()."',
        '".$livro->getEditora()."','".$livro->getEdicao()."','".$livro->getTipoDeOperacao()."',
        '".$livro->getGenero()."','".$livro->getEstado()."', '".$id_usuario."')";
        pg_query(conectaBanco(), $sql2);
        //BUSCAR O ID DO DONO PARA GUARDAR NO BANCO
    }
}

?>

