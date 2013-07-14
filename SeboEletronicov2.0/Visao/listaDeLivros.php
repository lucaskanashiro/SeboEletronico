<?php
include '../Controle/LivroControlador.php';
$id = $_REQUEST['livros'];



$listaLivros = LivroControlador::getLivroById($id);


?>

<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SeboEletronicov2.0/Visao/css/UsuarioStyle.css" type="text/css" media="all">
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
       
       <button class="button" onclick="user();">Usuário</button>       
       <button class="button" onclick="livro();">Livro</button>
       <button class="button" onclick="sair();">Sair</button>
       
   </div>
    
    <div id="mainmenu">
       
       <button class="button" onclick="cadastraLivro();">Cadastrar</button>
       <button class="button" onclick="">Alterar</button>       
       <button class="button" onclick="deletaLivro();">Deletar</button>
       <button class="button" onclick="pesquisaLivro();">Pesquisar</button>
   </div>
    
    <br/>
    <br/>
    <br/>
    
    
        
                <table class='insr'>

                <tr>
                    <th class='titlein' > <h5>Dados da Pesquisa de Livro</h5></th>
                </tr>
                
                <tr> 
                    <td>
                        <h2> Título: </h2> 
                         <h6>
                                <?php echo $listaLivros['titulo_livro']?>
                         </h6>
                    </td>
                </tr>
        
                <tr>
                    <td > 
                        <h2> Autor:</h2>
                        <h6>
                                <?php echo $listaLivros['autor']?>
                         </h6>
                    </td>
                </tr>
                
                <tr> 
                    <td>
                        <h2> Editora: </h2>
                        <h6>
                                <?php echo $listaLivros['editora']?>
                         </h6>
                    </td>
                </tr>

                <tr>              
                    <td>
                        <h2> Edição:</h2> 
                        <h6>
                                <?php echo $listaLivros['edicao']?>
                         </h6>
                    </td>    
                </tr>
                
                <tr>              
                    <td>
                        <h2> Tipo(s) de operação: </h2>
                        <h6>
                             <?php echo $listaLivros['venda']?>
                            <?php echo $listaLivros['troca']?>
                        </h6>
                    </td>    
                </tr>

                <tr>
                    <td>
                        <h2> Classificação: </h2>
                        <h6>
                                <?php echo $listaLivros['genero']?>
                        </h6>
                    </td>
                </tr>
                
                <tr>              
                    <td>
                        <h2> Estado:<h2/> 
                         <h6>
                             <?php echo $listaLivros['estado_conserv']?>
                         </h6>
                    </td>    
                </tr>

                <tr>              
                    <td>
                        <a href="http://localhost/SeboEletronicov2.0/Visao/alterarLivro.php?id=<?php echo $id ?> " title="Alterar Livro"> <img src="img/icone_lapis.png" align="left"> </a>
                        <a href=" " title="Excluir Livro"> <img src="img/icone_lixeira.png" align="right" > </a>
                    </td>    
                </tr>
                

                </table>    
        
 
    
    
</body>


</html>
</body>
