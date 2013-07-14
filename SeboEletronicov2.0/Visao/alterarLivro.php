<?php
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
    
    
    <form>
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
                                <input type="text" name="edicao" value="<?php echo $listaLivros['edicao']?>">
                         </h6>
                    </td>    
                </tr>
                
                <tr>              
                    <td>
                        <h2> Tipo(s) de operação: </h2>
                        <h6>
                            <?php if(empty($listaLivros['venda'])){ ?>
                            Venda <input type="checkbox" name="venda" value="venda"> 
                                <?php } else {?>
                            Venda <input type="checkbox" name="venda" value="venda" checked>
                                <?php } 
                                if(empty($listaLivros['troca'])){ ?>
                            Troca <input type="checkbox" name="troca" value="troca">
                                <?php }else { ?>
                            Troca <input type="checkbox" name="troca" value="troca" checked>
                                <?php }?>
                        </h6>
                    </td>    
                </tr>

                <tr>
                    <td>
                        <h2> Classificação: </h2>
                        <h6>
                                Engenharia <input type="radio" name="genero" value="Engenharia">
                                Engenharia de Software <input type="radio" name="genero" value="EngenhariaSoftware">
                                Engenharia Automotiva <input type="radio" name="genero" value="EngenhariaAutomotiva">
                                Engenharia de Energia <input type="radio" name="genero" value="EngenhariaEnergia">
                                Engenharia Eletrônica <input type="radio" name="genero" value="EngenhariaEletronica">
                                Engenharia Aeroespacial <input type="radio" name="genero" value="EngenhariaAeroespacial">
                        </h6>
                    </td>
                </tr>
                
                <tr>              
                    <td>
                        <h2> Estado:<h2/> 
                         <h6>
                            Novo <input type="radio" name="estado" value="novo">
                            Usado <input type="radio" name="estado" value="usado">
                         </h6>
                    </td>    
                </tr>

               <th>
                    <input type="hidden" name="tipo" value="alterarLivro"/>
                    <input type="submit" name='Enviar' value="ALTERAR" title='Enviar dados' />
                </th>
                

                </table>    
     </form>   
 
    
    
</body>


</html>
</body>

