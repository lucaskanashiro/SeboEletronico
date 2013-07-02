<?php

class ExcessaoSenhaInvalida extends InvalidArgumentException{
    function __construct($mensagem) {
        super($mensagem);
    }
}

?>
