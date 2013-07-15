<?php

class ExcessaoSenhaInvalida extends Exception {
    
    function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
