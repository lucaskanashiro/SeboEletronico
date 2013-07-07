<?php

    include '../Dao/LivroDao.php';
    include '../Modelo/Livro.php';
class LivroControlador {
    
    public function salvaLivro($titulo, $autor, $editora, $edicao, $tipoDeOperacao, $genero, $estado){
       
        LivroDao::salvaLivro($titulo, $autor, $edicao, $editora, $tipoDeOperacao, $genero, $estado);
    }
    
    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){
        LivroDao:: pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
    }
}

?>
