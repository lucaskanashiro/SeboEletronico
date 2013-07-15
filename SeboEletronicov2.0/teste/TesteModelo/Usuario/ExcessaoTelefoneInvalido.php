<?php

class ExcessaoTelefoneInvalido extends InvalidArgumentException{
    function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
