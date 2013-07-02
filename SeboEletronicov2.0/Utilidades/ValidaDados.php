<?php

class ValidaDados {

    
        public function validaCamposNulos($parametro){
            if(empty($parametro)){
                    return false;
            }
        }
        
        public function validaNome($nome){
            
            $caracteresValidos = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';
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
