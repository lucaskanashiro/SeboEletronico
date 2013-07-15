<?php
session_start();
$id_usuario = $_SESSION['id_usuario'];
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
       
       <button class="button" onclick="home();">Home</button>
       <button class="button" onclick="user();">Usuário</button>
       <button class="button" onclick="livro();">Livro</button>
       <button class="button" onclick="login();">Login</button>
       
   </div>
   
    <h1> Compra feita com Sucesso </h1>
    
   
    <?php
	//$_POST['tel_usuario'];

include "..\Utilidades\ConexaoComBanco.php";
	if(!$bd) die ("<h1>Falha no bd </h1>");

	$tel_comprador = $_POST ['tel_comprador'];
	$nome_comprador = $_POST['nome_comprador'];
	$id_livro = $_POST['id_livro'];
	$id_dono = $_POST['id_dono'];



//Dados Vendedor
$strSQL = "SELECT * FROM usuario WHERE id_usuario = '$id_dono' ";
 
 $rs = mysql_query($strSQL);
		
		while($row = mysql_fetch_array($rs)) {
	   
		$email_vendedor = $row['email_usuario'] . "<br />";
		
		}



	

include '../Modelo/Usuario.php';

include "..\Utilidades\ConexaoComBanco.php";
	if(!$bd) die ("<h1>Falha no bd </h1>");
	
	$strSQL5 = "UPDATE livro SET operacao = 'V' WHERE id_livro = $id_livro ";
		 $rs5 = mysql_query($strSQL5);

/*$destinatario = $email_vendedor;
$mensagem ='<html>
				<body>
					<table background = "http://i.imgur.com/GX69Php.jpg" height = "800" width=" 650" padding-top = "300" padding-right= "100" padding-bottom ="300" padding-left= "100">
							
						<tr>
							<td valign="top">
								<br><br><br><br><br><br><br><br><br><br><br><br>
								<br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome do Livro: </br></font>
								<br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nome do Comprador: </br></font>
								<br><font color = "#FFFFFF" size = "6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: </br></font>                          
							</td>
						</tr>
					</table>		
				</body>

				</html>';


$subject= 'Existe uma pessoa interessada no seu Livro - Sebo Eletronico'; // Assunto.
$to= $destinatario; // Para.
$body= $mensagem; // corpo do texto.
if (mail($to,$subject,$body,"Content-Type: text/html"))
echo 'e-mail enviado com sucesso!';
else
echo 'e-mail nao enviado!'; */
?>
    
    
</body>


</html>