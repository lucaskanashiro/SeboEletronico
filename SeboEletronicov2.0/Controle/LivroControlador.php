<?php

include '../Modelo/Livro.php';
    
class LivroControlador {
    
    public function salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono){
       
       return Livro::salvaLivro($titulo, $autor, $genero, $edicao, $editora, $venda, $troca, $estado, $descricao, $id_dono);
    }
    
    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){
       return Livro:: pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
    }
    
    public function getLivroById($listaLivros){
        return Livro::getLivroById($listaLivros);
    }
    
    public function deletaLivro($titulo){
       return Livro::deletaLivro($titulo);
    }
    
    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $operacaoVenda, $operacaoTroca, $estado, $descricao, $id, $id_usuario){
        return Livro::alteraLivro($titulo, $autor, $genero, $edicao, $editora,$operacaoVenda, $operacaoTroca, $estado, $descricao, $id, $id_usuario);
    }
}

?>
