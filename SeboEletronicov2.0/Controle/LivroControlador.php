<?php

include '../Modelo/Livro.php';
    
class LivroControlador {
    
    public function salvaLivro($titulo, $autor, $editora, $edicao, $operacao1, $operacao2, $genero, $estado, $descricao){
       
       return Livro::salvaLivro($titulo, $autor, $editora, $edicao, $operacao1, $operacao2, $genero, $estado, $descricao);
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
    
    public function alteraLivro($titulo, $autor, $genero, $edicao, $editora, $operacaoVenda, $operacaoTroca, $estado, $descricao, $id){
        return Livro::alteraLivro($titulo, $autor, $genero, $edicao, $editora,$operacaoVenda, $operacaoTroca, $estado, $descricao, $id);
    }
}

?>
