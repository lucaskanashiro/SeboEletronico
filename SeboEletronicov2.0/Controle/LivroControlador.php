<?php

    include '../Dao/LivroDao.php';
    include '../Modelo/Livro.php';
class LivroControlador {
    
    public function salvarLivro($titulo, $autor, $editora, $edicao, $tipoDeOperacao, $genero, $estado){
        $livro = new Livro($titulo, $autor, $edicao, $editora, $tipoDeOperacao, $genero, $estado);
        LivroDao::salvaLivro($livro);
    }
    
  
}

?>
