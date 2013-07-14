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
                         $genero = $_POST['class'];
                         $estado = $_POST['estado'];
                         $descricao = $_POST['descricao'];
                         $id_dono = $_POST['id_dono'];
                         
                        $salvo = LivroControlador::salvaLivro($titulo, $autor, $editora, $edicao, $operacao1, $operacao2, $genero, $estado, $descricao, $id_dono);
                         
                         
                         if (!empty($salvo)){
                              echo "<script>altert('Livro cadastrado com sucesso!')</script>";
                         }
                         else {
                             echo "<script>('Falha ao cadastrar o livro, tente novamente.')</script>";
                         }
                           
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
      
      case "alterarLivro":   $titulo = $_POST['titulo'];
                        $autor = $_POST['autor'];
                        $genero = $_POST['genero'];
                        $edicao = $_POST['edicao'];
                        $venda = $_POST['venda'];
                        $troca = $_POST['troca'];
                        $estado = $_POST['estado_conserv'];
                        $id = $_POST['id'];
                        LivroControlador::alteraLivro($titulo, $autor, $genero, $edicao, $editora,$venda, $troca, $estado, $descricao, $id);
                        ?>
                            <script language = "Javascript">
                            window.location="http://localhost/SeboEletronicov2.0/Visao/indexLivro.php";
                            </script><?php
                        
                    break;
      case "excluiLivro": $titulo = $_POST['titulo'];
         
                            LivroControlador::deletaLivro($titulo);
          
                        ?>
                            <script language = "Javascript">
                            window.location="http://localhost/SeboEletronicov2.0/Visao/indexLivro.php";
                            </script><?php
                    break; 
            
    }
?>
