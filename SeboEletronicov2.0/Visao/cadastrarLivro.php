<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SeboEletronicov2.0/Visao/css/LivrosStyle.css" type="text/css" media="all">
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
       
       <button class="button" onclick="home();">Home</button>
       <button class="button" onclick="user();">Usuario</button>
       <button class="button" onclick="livro();">Livro</button>
       
   </div>
    
    <div id="mainmenu">
       
       <button class="button" onclick="cadastraLivro();">Cadastrar</button>
       <button class="button" onclick="">Alterar</button>       
       <button class="button" onclick="">Deletar</button>
       <button class="button" onclick="pesquisaLivro();">Pesquisar</button>
   </div>
    
    <br/>
    <br/>
    <br/>
    
    <form  name="Insere Dados" action="http://localhost/SeboEletronicov2.0/Utilidades/RecebeForm.php" method="post" class="Formulario">
        
                <table class='insr'>

                <tr>
                    <th class='titlein' > <h5>Cadastro de Livro</h5></th>
                </tr>
                
                <tr> 
                    <td>
                        <h2> Título: <input type="text" name="titulo"/></h2> 
                    </td>
                </tr>
        
                <tr>
                    <td > 
                        <h2> Autor: <input type="text" name="autor"/></h2>
                    </td>
                </tr>
                
                <tr> 
                    <td>
                        <h4> Editora: <input type="text" name="editora"/></h4>
                    </td>
                </tr>

                <tr>              
                    <td>
                        <h3> Edição: <input type="number" name="number"/></h3> 
                    </td>    
                </tr>
                
                <tr>              
                    <td>
                        <h7> Descrição: <input type="textarea" name="descricao"></h7> 
                    </td>    
                </tr>
                
                <tr>              
                    <td>
                        <h2> Tipo(s) de operação: </h2>
                        <h1>
                                        <input type="checkbox" name="venda" value="op1"/> Venda <br/>
                                        <input type="checkbox" name="troca" value="op2"/> Troca <br/>
                        </h1>
                    </td>    
                </tr>

                <tr>
                    <td>
                        <h2> Classificação: </h2>
                        <h1>
                                <input type="radio" name="class" value="clas1"/> Engenharia <br/>
                                <input type="radio" name="class" value="clas2"/> Engenharia de Software <br/>
                                <input type="radio" name="class" value="clas3"/> Engenharia de Energia <br/>
                                <input type="radio" name="class" value="clas4"/> Engenharia Eletronica <br/>
                                <input type="radio" name="class" value="clas5"/> Engenharia Automotiva <br/>
                                <input type="radio" name="class" value="clas6"/> Engenharia Aeroespacial <br/>
                        </h1>
                    </td>
                </tr>
                
                <tr>              
                    <td>
                        <h2> Estado:<h2/> 
                         <h1>
                             <input type="radio" name="estado" value="novo"/>Novo<br/>
                             <input type="radio" name="estado" value="usado"/>Usado<br/>
                         <h1/>
                    </td>    
                </tr>
                <th>
                    <input type="hidden" name="tipo" value="cadastraLivro"/>
                    <input type="submit" name='Enviar' value="ENVIAR" title='Enviar dados' />
                    <input type="reset" name='Limpar' value="LIMPAR DADOS" title='Limpar dados' /> 
                </th>

                </table>    
        
    </form>
    
    
</body>


</html>
</body>
