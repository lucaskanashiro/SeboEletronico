<?php
session_start();
include '../Controle/LivroControlador.php';
$id = $_SESSION['id_usuario'];

$listaLivros = LivroControlador::getLivroByIdUsuario($id);
?>

<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SeboEletronicov2.0/Visao/css/MeusLivrosStyle2.css" type="text/css" media="all">
        <link rel="stylesheet" href="http://localhost/SeboEletronicov2.0/Visao/css/main.css" type="text/css" media="all">
        <link rel="shortcut icon" href="http://localhost/SeboEletronicov2.0/Visao/img/android.ico">
        <script src="http://localhost/SeboEletronicov2.0/Utilidades/Redireciona.js"></script> 
    <title>Sebo Eletrônico</title>
    
</head>
<body>
    <div id="header">
		<div id="logo"><img src="http://localhost/SeboEletronicov2.0/Visao/img/sebo_header.png" class="imgHeader"/></div>
    </div>
    
    <div id="mainmenu">
       <button class="button" onclick="home()">Home</button>
       <button class="button" onclick="user();">Usuário</button>       
       <button class="button" onclick="livro();">Livro</button>
       <button class="button" onclick="sair();">Sair</button>
       
   </div>
    
    <div id="mainmenu">
       
       <button class="button" onclick="meusLivros();">Meus Livros</button>
       <button class="button" onclick="livrosDisponiveis();">Livros Disponiveis</button>
       <button class="button" onclick="cadastraLivro();">Cadastrar</button>
       <!--<button class="button" onclick="deletaLivro();">Deletar</button>-->
       <button class="button" onclick="pesquisaLivro();">Pesquisar</button>
   </div>
    
    <br/>
    <br/>
    <br/>
        <!-- tr = linha
             td = coluna-->
                <table class="lista">

                <tr>
                    <th class='titlein' > <h5>Meus Livros</h5></th>
                </tr>
  <?php  foreach($listaLivros as $chave => $valor){ 
                          ?>              
                <tr> 
                    <td>
                        <h2> Título: </h2> 
                         <h6>
                           <?php echo $valor['titulo_livro'] ?>     
                         </h6>
                    </td>
                
                    <td > 
                        <h2> Autor:</h2>
                        <h6>
                           <?php echo $valor['autor'] ?>     
                         </h6>
                    </td>
                    
                    <td>
                        <h2> Editora: </h2>
                        <h6>
                                <?php echo $valor['editora'] ?>
                         </h6>
                    </td>
             
                    <td>
                        <h2> Edição:</h2> 
                        <h6>
                                <?php echo $valor['edicao'] ?>
                         </h6>
                    </td>    
             
                    <td>
                        <h2> Descrição: </h2>
                        <h6>
                                <?php echo $valor['descricao_livro'] ?>
                        </h6>
                    </td>    
             
                    <td>
                        <h2> Tipo(s) de operação: </h2>
                        <h6>
                                <?php echo $valor['venda'];
                                      echo "<br/>";
                                      echo $valor['troca'] ?>
                        </h6>
                    </td>    
                    
                    <td>
                        <h2> Genero: </h2>
                        <h6>
                                <?php echo $valor['genero'] ?>
                        </h6>
                    </td>
             
                    <td>
                        <h2> Estado:<h2/> 
                        <h6>
                             <?php echo $valor['estado_conserv'] ?>
                        </h6>
                    </td>    
                

                    <td>
                        <a href="http://localhost/SeboEletronicov2.0/Visao/alterarLivro.php?id=<?php echo $valor['id_livro'] ?> " title="Alterar Livro"> <img src="img/icone_lapis.png" align="left"> </a>
                        <a href="http://localhost/SeboEletronicov2.0/Utilidades/RecebeFormLivro.php?id_livro=<?php echo $valor['id_livro'] ?> " title="Excluir Livro"> <img src="img/icone_lixeira.png" align="right" > </a>
                    </td>    
                </tr>
      <?php }?>         

                </table>    
        
 
    
    
</body>


</html>
</body>
