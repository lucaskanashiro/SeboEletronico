<?php

class ExcessaoTelefoneInvalido extends Exception{
    function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
