<?php

class ExcessaoTituloInvalido extends InvalidArgumentException{
    function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
