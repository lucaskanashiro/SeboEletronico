<?php
    
    function conectaBanco(){
        $string_de_conexao = "host=localhost port=5433 dbname=sebo user=seboeletronico password=sebo";
        $dbcon = pg_connect($string_de_conexao);
      return $dbcon;  
    }
?>
