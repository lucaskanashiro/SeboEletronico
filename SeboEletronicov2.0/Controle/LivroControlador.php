<?php

    include '../Dao/LivroDao.php';
    include '../Modelo/Livro.php';
class LivroControlador {
    
    public function salvaLivro($titulo, $autor, $editora, $edicao, $operacao1, $operacao2, $classificacao, $estado){
       
        LivroDao::salvaLivro($titulo, $autor, $editora, $edicao, $operacao1, $operacao2, $classificacao, $estado);
    }
    
    public function pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca){
       return LivroDao:: pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
    }
    public function getLivroById($listaLivros){
        return LivroDao::getLivroById($listaLivros);
    }
    
    public function deletaLivro($titulo){
        LivroDao::deletaLivro($titulo);
    }
}

?>
