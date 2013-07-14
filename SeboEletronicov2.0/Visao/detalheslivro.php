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
  
  
  
  
   ?>
  
  
  
  
</body>


</html>