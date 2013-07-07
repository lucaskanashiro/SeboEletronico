<?php
	$connect = mysql_connect("localhost", "root", "");
		if (!$connect) die ("<h1>Falha na Conexao </h1>");
				
		$bd = mysql_select_db ("sebo eletronico");		
		
?>