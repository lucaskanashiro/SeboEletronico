<?php

class LivroDao {
    
    public function pesquisaLivro(){
        
    }
    
    public function salvaLivro(){
         $livro = new Livro($titulo, $autor, $editora, $edicao, $tipoDeOperacao, $genero, $estado);
         
        $sql="INSERT INTO livro (titulo_livro, autor, editora, edicao, tipo_Operacao,genero, 
        estado_conserv) VALUES ('".$livro->getTitulo()."', '".$livro->getAutor()."',
        '".$livro->getEditora()."','".$livro->getEdicao()."','".$livro->getTipoDeOperacao()."',
        '".$livro->getGenero()."','".$livro->getEstado()."')";
        pg_query(conectaBanco(), $sql);

        $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$senhaSalvar."'";
        $resultado = $id_senha = pg_query(conectaBanco(), $sql2);
        $id_senha = pg_fetch_array($resultado);

        $sql3="INSERT INTO usuario (nome, email, telefone, senha_id) VALUES ('".$usuario->getNome()."', 
            '".$usuario->getEmail()."', '".$usuario->getTelefone()."','".$id_senha['id_senha']."')";
        pg_query(conectaBanco(), $sql3);
    }
}

?>
