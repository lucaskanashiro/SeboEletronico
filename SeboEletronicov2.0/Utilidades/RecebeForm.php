<?php

include_once '../Controle/UsuarioControlador.php';
//require_once '';

switch($_POST['tipo']){
      
      case "cadastrar":  $nome = $_POST['nome'];
                         $email = $_POST['email'];
                         $telefone = $_POST['telefone'];
                         $senha = $_POST['senha'];

                         UsuarioControlador::salvaUsuario($nome, $email, $telefone, $senha);
                         ?>
                            <script language = "Javascript">
                            window.location="http://localhost/SeboEletronicov2.0/Visao/indexUsuario.php";
                            </script><?php
                            
                          break;
      case "fEmail":  $email = $_POST['email'];
                      $senha = $_POST['senha'];
                      
                      UsuarioControlador::checaCadastro($email, $senha);
                    break;
      
      case "alterar":   $nome = $_POST['nome'];
                        $email = $_POST['email'];
                        $telefone = $_POST['telefone'];
                        $senha = $_POST['senha'];
                        $id = $_POST['id_pessoa'];
                        
                        UsuarioControlador::alterarCadastro($nome, $email, $telefone, $senha, $id);
                        ?>
                            <script language = "Javascript">
                            window.location="http://localhost/SeboEletronicov2.0/Visao/indexUsuario.php";
                            </script><?php
                        
                    break;
      case "deletar": $email = $_POST['email'];
                      $senha = $_POST['senha'];
                      
                      UsuarioControlador::deletaCadastro($email,$senha);
                      ?>
                            <script language = "Javascript">
                            window.location="http://localhost/SeboEletronicov2.0/Visao/indexUsuario.php";
                            </script><?php
                    break;
      case "pesquisar": 
          
                    break;
      
    }
?>
