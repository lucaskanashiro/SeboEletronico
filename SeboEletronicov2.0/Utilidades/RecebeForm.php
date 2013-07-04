<?php

include_once '../Controle/UsuarioControlador.php';
//require_once '';

    if($_POST['tipo']=='cadastra'){
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];
        
        UsuarioControlador::salvaUsuario($nome, $email, $telefone, $senha);
    }
?>
