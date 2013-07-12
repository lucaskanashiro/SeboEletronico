<?php

class ExcessaoNomeInvalido extends InvalidArgumentException{
    
    function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
