<?php

	include "../Dao/conexao_bd.inc";
	if(!$bd) die ("<h1>Falha no bd </h1>");
		
	$sql = "SELECT * FROM livro WHERE id_dono = '8'";
        $result = mysql_query($sql);
        
        $cont =0;
        $registro = mysql_fetch_assoc($result);

        
//        
//        while() {
//	   
//                 
//		 $listaLivros = array($cont=>$registro);
//                 
//                 
//                 $cont++;
//		}
//             
                
        
        var_dump($registro);
        
	?> 
	
	<input type=button value="Compre" onClick="alert('Compra feita com Sucesso')">

	<a id="myLink" href="add_carrinho.php" onclick="fazer();">Comprar</a>
		