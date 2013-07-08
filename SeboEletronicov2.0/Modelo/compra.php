<?php

class faz{
	public function fazer () {
	
		
//<input type=button value="sadfc it now" onClick="alert('Hello from JavaScript!')">

		return TRUE;
	
	}
}
	include "conexao_bd.inc";
	if(!$bd) die ("<h1>Falha no bd </h1>");
		
		
		$strSQL = "SELECT * FROM livro WHERE tipo_operacao = 'COMPRA' ";
						
			
		$rs = mysql_query($strSQL);
		
		while($row = mysql_fetch_array($rs)) {
	   
		echo $row['titulo_livro'] . "<br />";
		echo $row['estado_conserv'] . "<br />";
		//echo $row['tipo_operacao'] . "<br /> <br />" ;
		
		
		}
	?> 
	
	<input type=button value="Compre" onClick="alert('Compra feita com Sucesso')">

	<a id="myLink" href="add_carrinho.php" onclick="fazer();">Comprar</a>
		