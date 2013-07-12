<?php

class ExcessaoEmailInvalido extends InvalidArgumentException{
	function  __construct($mensagem){
		parent::__construct($mensagem);
	}
}
?>

