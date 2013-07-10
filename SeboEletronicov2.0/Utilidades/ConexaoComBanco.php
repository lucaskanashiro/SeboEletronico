<?php
    
        $server = "localhost";
        $username = "SeboEletronico";
        $senha = "sebo";
        $dbcon = mysql_connect($server, $username, $senha);
        
        if(!$dbcon){
            die ("Não foi possível conectar: " . mysql_error());
        }
        $bd = mysql_select_db ("sebo eletronico");
        
      
   
?>
