<?php

class ExcessaoNomeInvalido extends InvalidArgumentException{
    
    function __construct($mensagem) {
        super($mensagem);
    }
}

?>
