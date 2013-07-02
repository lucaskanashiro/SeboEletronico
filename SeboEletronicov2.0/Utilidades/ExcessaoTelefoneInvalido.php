<?php

class ExcessaoTelefoneInvalido extends InvalidArgumentException{
    function __construct($mensagem) {
        super($mensagem);
    }
}

?>
