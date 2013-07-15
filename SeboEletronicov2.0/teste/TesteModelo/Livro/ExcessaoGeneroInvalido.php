<?php

class ExcessaoGeneroInvalido extends InvalidArgumentException{
     function __construct($mensagem) {
        parent::__construct($mensagem);
    }
}

?>
