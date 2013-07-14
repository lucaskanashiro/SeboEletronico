<!DOCTYPE HTML>
<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="http://localhost/SeboEletronicov2.0/Visao/css/UsuarioStyle.css" type="text/css" media="all">
        <link rel="stylesheet" href="http://localhost/SeboEletronicov2.0/Visao/css/main.css" type="text/css" media="all">
        <link rel="shortcut icon" href="http://localhost/SeboEletronicov2.0/Visao/img/android.ico">
        <script src="http://localhost/SeboEletronicov2.0/Utilidades/Redireciona.js"></script> 
        
    <title>Sebo Eletronico</title>
    
</head>
<body>
	<?php
		$_POST['mural'];			
		$_POST['nome_comprador'];
		$_POST ['id_livro'];
			
			$mural = $_POST['mural'];
			//$nome_comprador = $_POST['nome_comprador'];
			
	
	include "..\Utilidades\ConexaoComBanco.php";
	if(!$bd) die ("<h1>Falha no bd </h1>");
	
	
	//Acessar Informações do comprador
  $id_livro = $_POST['id_livro'];
  
  $email_usuario = $_POST ["email_usuario"];
  
  $email_usuario = "joao@hot.com";
  $strSQL4 = "SELECT * FROM usuario WHERE email_usuario = '$email_usuario' ";
  
   $rs4 = mysql_query($strSQL4);
		
		while($row = mysql_fetch_array($rs4)) {
	   
		$nome_comprador = $row['nome_usuario'];
			}
	
	
	$insere = mysql_query("INSERT INTO mural (texto,nome_pergunta,id_livro) VALUES ('$mural', '$nome_comprador', '$id_livro')");

  
  
   ?>
  
  
  
	
    <div id="header">
		<div id="logo"><img src="http://localhost/SeboEletronicov2.0/Visao/img/sebo_header.png" class="imgHeader"/></div>
    </div>
   
   <div id="mainmenu">
       
       <button class="button" onclick="home();">Home</button>
       <button class="button" onclick="user();">Usuario</button>
       <button class="button" onclick="livro();">Livro</button>
       <button class="button" onclick="login();">Login</button>
       
   </div>
   
 
 
 
 <?php
   
   include "..\Utilidades\ConexaoComBanco.php";
	if(!$bd) die ("<h1>Falha no bd </h1>");
   
  //Acessar Informações do comprador
  
   
  $email_usuario = $_POST ["email_usuario"];
  
  $email_usuario = "joao@hot.com";
  $strSQL2 = "SELECT * FROM usuario WHERE email_usuario = '$email_usuario' ";
  
   $rs2 = mysql_query($strSQL2);
		
		while($row = mysql_fetch_array($rs2)) {
	   
		$nome_comprador = $row['nome_usuario'] . "<br />";
		$tel_comprador =  $row['telefone_usuario'] . "<br />";		
		}
 
 
 
 
 
 
   
  
  ?>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
</body>


</html>