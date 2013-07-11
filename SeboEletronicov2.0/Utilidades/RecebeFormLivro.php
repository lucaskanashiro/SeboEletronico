<?php

include_once '../Controle/LivroControlador.php';
//require_once '';

switch($_POST['tipo']){
      
      case "cadastraLivro":  $titulo = $_POST['titulo'];
                         $autor = $_POST['autor'];
                         $editora = $_POST['editora'];
                         $edicao = $_POST['number'];
                         $operacao1= $_POST['venda'];
                         $operacao2= $_POST['troca'];
                         $classificacao = $_POST['class'];
                         $estado = $_POST['estado'];
                         
                         LivroControlador::salvaLivro($titulo, $autor, $editora, $edicao, $operacao1, $operacao2, $classificacao, $estado);
                         ?>
                            <script language = "Javascript">
                            window.location="http://localhost/SeboEletronicov2.0/Visao/indexLivro.php";
                            </script><?php
                            
                          break;
      
      case "pesquisaLivro":
                $titulo = $_POST['titulo'];
                $estadoNovo = $_POST['novo'];
                $estadoUsado = $_POST['usado'];
                $disponibilidadeVenda = $_POST['venda'];
                $disponibilidadeTroca = $_POST['troca'];
                    
                 $listaLivros = LivroControlador::pesquisaLivro($titulo, $estadoNovo, $estadoUsado, $disponibilidadeVenda, $disponibilidadeTroca);
                 $idLivro = $listaLivros['id_livro'];
                 
                        ?>
                            <script language = "Javascript">
                            window.location="http://localhost/SeboEletronicov2.0/Visao/listaDeLivros.php?livros=<?php echo $idLivro?>";
                            </script><?php
                break;
      
      /*case "alterar":   $nome = $_POST['nome'];
                        $email = $_POST['email'];
                        $telefone = $_POST['telefone'];
                        $senha = $_POST['senha'];
                        $id = $_POST['id_pessoa'];
                        
                        UsuarioControlador::alterarCadastro($nome, $email, $telefone, $senha, $id);
                        ?>
                            <script language = "Javascript">
                            window.location="http://localhost/SeboEletronicov2.0/Visao/indexUsuario.php";
                            </script><?php
                        
                    break;*/
      case "excluiLivro": $titulo = $_POST['titulo'];
         
                            LivroControlador::deletaLivro($titulo);
          
                        ?>
                            <script language = "Javascript">
                            window.location="http://localhost/SeboEletronicov2.0/Visao/indexLivro.php";
                            </script><?php
                    break; 
            
    }
?>
