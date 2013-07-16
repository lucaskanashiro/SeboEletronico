<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];
$senha = $_SESSION['senha'];
include '../Controle/UsuarioControlador.php';
$cadastro = UsuarioControlador::checaCadastroId($id_usuario);

?>
<!DOCTYPE HTML>
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
       
       <button class="button" onclick="altera();">Alterar</button>       
       <button class="button" onclick="deleta();">Deletar</button> 
       <button class="button" onclick="pesquisa();">Pesquisar</button>
       
       
   </div>
    
    <br/>
    <br/>
    <br/>
    
    <form  name="Insere Dados" action="http://localhost/SeboEletronicov2.0/Utilidades/RecebeForm.php" method="post" class="formu">
        
                <table class='insr'>

                <tr>
                    <th class='titlein' > <h5>Deletar Cadastro de: </h5></th>
                </tr>
        
                <tr>
                    <td > 
                        <h4> <?php echo $cadastro['nome_usuario'] ?></h4>
                    </td>
                </tr>
                
                
                <th>
                    <input type="hidden" name="tipo" value="deletar"/>
                    <input type="hidden" name="email" value="<?php echo $cadastro['email_usuario']?>"/>
                    <input type="hidden" name="senha" value="<?php echo $senha?>"/>
                    <input type="submit" name='Enviar' value="Excluir" title='Excluir Usuário' />
                </th>

                </table>    
        
    </form>
    
    
</body>


</html>