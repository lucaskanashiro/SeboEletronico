<?php

class ValidaDados {

    
        public function validaCamposNulos($parametro){
            return !(empty($parametro));
            //retorna verdadeiro caso a variavel esteja vazia
            //com isso, o valor false eh invertido e enviado como true
        }
        
        public function validaNome($nome){
            
            $caracteresValidos = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìùäëïöüýñ';
            $vetorDeChar = str_split($nome);
            
            for ($i = 0; $i < count($vetorDeChar); $i++) {
                $char = stripos($caracteresValidos, $vetorDeChar[$i]);
                if(!$char){
                    return false;
                }
            }
        }
        
        public function validaEmail($email){
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return false;
           }
        }
        
        public function validaTelefone($telefone){
            
            if(!filter_var($telefone, FILTER_VALIDATE_INT)){
                return false;
            }
        }
        
        public function validaSenha($senha){

            if( !filter_var($senha[0], FILTER_VALIDATE_INT)){//caracter invalido
                return 1;
            }elseif(strlen($senha[0]) != 6 || strlen($senha[1]) != 6){//tamanho invalido
                return 2;
            }elseif($senha[0]!== $senha[1]){//senha e confirmação diferentes
                return 3;
            }else{
                return 0;
            }
        }
}


?>
