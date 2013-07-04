<?php

    include '../Dao/LivroDao.php';
    include '../Modelo/Livro.php';
class LivroControlador {
    
    public function salvarLivro($titulo, $autor, $editora, $edicao, $tipoDeOperacao, $genero){
        $livro = new Livro($titulo, $autor, $edicao, $editora, $tipoDeOperacao, $genero);
        LivroDao::salvaLivro($livro);
    }
    
  
}

?>
