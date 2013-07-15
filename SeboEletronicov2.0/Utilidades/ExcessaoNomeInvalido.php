<?php

class ExcessaoNomeInvalido extends Exception{
    
    function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
