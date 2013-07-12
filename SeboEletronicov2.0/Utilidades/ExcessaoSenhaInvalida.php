<?php

class ExcessaoSenhaInvalida extends InvalidArgumentException{
    function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
