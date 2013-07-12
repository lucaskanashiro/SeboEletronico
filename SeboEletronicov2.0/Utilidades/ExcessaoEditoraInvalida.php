<?php

class ExcessaoEditoraInvalida extends InvalidArgumentException{
    function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
