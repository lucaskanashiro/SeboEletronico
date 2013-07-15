<?php

session_start();
$id_usuario = $_SESSION['id_usuario'];

include '../Controle/LivroControlador.php';
$id = $_REQUEST['id'];
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
    
    
    <form name="Insere Dados" action="http://localhost/SeboEletronicov2.0/Utilidades/RecebeFormLivro.php" method="post" class="Formulario">
                <table class='insr'>

                <tr>
                    <th class='titlein' > <h5>Alterar Livro</h5></th>
                </tr>
                
                <tr> 
                    <td>
                        <h2> Título: </h2> 
                         <h6>
                             <input  type="text" name="titulo" value="<?php echo $listaLivros['titulo_livro']?>" >
                         </h6>
                    </td>
                </tr>
        
                <tr>
                    <td > 
                        <h2> Autor:</h2>
                        <h6>
                               <input type="text" name="autor" value="<?php echo $listaLivros['autor']?>">
                         </h6>
                    </td>
                </tr>
                
                <tr> 
                    <td>
                        <h2> Editora: </h2>
                        <h6>
                               <input type="text" name="editora" value="<?php echo $listaLivros['editora']?>">
                         </h6>
                    </td>
                </tr>

                <tr>              
                    <td>
                        <h2> Edição:</h2> 
                        <h6>
                                <input type="number" name="edicao" min="1" max="20" step="1" value="<?php echo $listaLivros['edicao']?>">
                         </h6>
                    </td>    
                </tr>
                
                <tr>              
                    <td>
                        <h2> Descrição: </h2>
                        <h6>
                            <input type="textarea" name="descricao" value="<?php echo $listaLivros['descricao_livro']?>"> 
                        </h6>
                    </td>    
                </tr>
                
                <tr>              
                    <td>
                        <h2> Tipo(s) de operação: </h2>
                        <h6>
                            <input type="checkbox" name="venda" value="venda"/> Venda <br/>
                            <input type="checkbox" name="troca" value="troca"/> Troca <br/>
                        </h6>
                    </td>    
                </tr>

                <tr>
                    <td>
                        <h2> Classificação: </h2>
                        <h6>
                                <input type="radio" name="genero" value="Engenharia" checked/> Engenharia <br/>
                                <input type="radio" name="genero" value="Engenharia de Software"/> Engenharia de Software <br/>
                                <input type="radio" name="genero" value="Engenharia de Energia"/> Engenharia de Energia <br/>
                                <input type="radio" name="genero" value="Engenharia Eletronica"/> Engenharia Eletronica <br/>
                                <input type="radio" name="genero" value="Engenharia Automotiva"/> Engenharia Automotiva <br/>
                                <input type="radio" name="genero" value="Engenharia Aeroespacial"/> Engenharia Aeroespacial <br/>
                        </h6>
                    </td>
                </tr>
                
                <tr>              
                    <td>
                        <h2> Estado:<h2/> 
                         <h6>
                            <input type="radio" name="estado" value="novo" checked/>Novo<br/>
                             <input type="radio" name="estado" value="usado"/>Usado<br/>
                         </h6>
                    </td>    
                </tr>

               <th>
                    <input type="hidden" name="tipo" value="alterarLivro"/>
                    <input type="hidden" name="id" value="<?php echo $id?>"/>
                    <input type="hidden" name="id_dono" value="<?php echo $id_usuario?>"/>
                    <input type="submit" name='Enviar' value="ALTERAR" title='Enviar dados'/>
                </th>
                

                </table>    
     </form>   
 
    
    
</body>


</html>
</body>

