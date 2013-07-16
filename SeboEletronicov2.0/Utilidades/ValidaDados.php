<?php

class ValidaDados {

    
        public function validaCamposNulos($parametro){
            return !(empty($parametro));
            //retorna verdadeiro caso a variavel esteja vazia
            //com isso, o valor false eh invertido e enviado como true
        }
        
        public function validaSenhaNula($senha){
            return (!(empty($senha[0])) && !(empty($senha[1])));
        }
        
        public function validaNome($nome){

            $caracteresValidos = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';
            
            for ($i = 0; $i < strlen($nome); $i++) {
                $char = stripos($caracteresValidos, $nome[$i]);
                if(!$char){
                    return 1;
                }
                
                if($nome[$i] == " " && $nome[$i+1] == " "){
                    return 2;   
                }
            }
        }
        
        public function validaEmail($email){
           if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                return 1;
           }
        }
        
        public function validaTelefone($telefone){
            
            if(!filter_var($telefone, FILTER_VALIDATE_INT)){
                return 1;
            }elseif(strlen($telefone) != 8){
                return 2;
            }
        }
        
        public function validaSenha($senha){

            if( !filter_var($senha[0], FILTER_VALIDATE_INT)){//caracter invalido
                return 1;
            }elseif(strlen($senha[0]) != 6 || strlen($senha[1]) != 6){//tamanho invalido
                return 2;
            }elseif($senha[0]!= $senha[1]){//senha e confirmação diferentes
                return 3;
            }
        }

}


?>
