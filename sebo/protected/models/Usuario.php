<?php


class Usuario extends CActiveRecord
{
    	private $id_pessoa;
    	private $senha_id;
    	private $nome;
    	private $email;
    	private $telefone;
            	
    	public function __construct($nome, $email, $telefone){
    		$this->nome = $nome;
    		$this->email = $email;
    		$this->telefone = $telefone;
    	}
    
        public function validaCamposNulos($nome, $email, $telefone, $senha){
            if(empty($nome) || empty($email) || empty($telefone) || empty($senha[0]) || empty($senha[1])){
                    ?>
                    <script language="Javascript" type="text/javascript">
                        alert("Não é possível cadastrar usuario,\nexistem campos em branco.\n\n\
                        Todos os campos devem ser preenchidos!");
                        window.location='<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/index';
                    </script>
                    <?php
            }
        }
        
        public function validaNome($nome){
            
            $caracteresValidos = '. abcdefghijklmnopqrstuvwxyzçãõáíóúàòìù';
            $vetorDeChar = str_split($nome);
            
            for ($i = 0; $i < count($vetorDeChar); $i++) {
                $char = stripos($caracteresValidos, $vetorDeChar[$i]);
                //stripos - retorna false se o nome[i] nao existir dentro da string de validos
                if(!$char){
                    ?>
                    <script language="Javascript" type="text/javascript">
                        alert("Não é possível cadastrar usuario,\nO campo 'NOME' possui caracteres invalidos!");
                        window.location='<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/index';
                    </script>
                    <?php
                }
            }
        }
        
        public function validaEmail($email){
            
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            ?>
                <script language="Javascript" type="text/javascript">
                    alert("Não é possível cadastrar usuario,\nO campo 'E-MAIL' possui caracteres invalidos!");
                    window.location='<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/index';
                </script>
                <?php
            }
        }
        
        public function validaTelefone($telefone){
            
            if(!filter_var($telefone, FILTER_VALIDATE_INT)){
            ?>
                <script language="Javascript" type="text/javascript">
                    alert("Não é possível cadastrar usuario,\nO campo 'TELEFONE' possui caracteres invalidos!");
                    window.location='<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/index';
                </script>
                <?php
            }
        }
        
        public function validaSenha($senha){

            if( !filter_var($senha[0], FILTER_VALIDATE_INT)){//caracter invalido
                $resultado = 1;
            }elseif(strlen($senha[0]) > 6 || strlen($senha[1]) > 6){//tamanho invalido
                $resultado = 2;
            }elseif($senha[0]!==$senha[1]){//senha e confirmação diferentes
                $resultado = 3;
            }else{
                $resultado = 0;
            }
            
            switch($resultado){
                case 1:
                    ?>
                    <script language="Javascript" type="text/javascript">
                        alert("Não é possível cadastrar usuario,\nO campo 'Senha' possui caracteres invalidos!");
                        window.location='<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/index';
                    </script>
                    <?php
                    break;
                case 2:
                    ?>
                    <script language="Javascript" type="text/javascript">
                        alert("Não é possível cadastrar usuario,\nO campo 'Senha' possui mais de 6 digitos!");
                        window.location='<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/index';
                    </script>
                    <?php
                    break;
                case 3:
                    ?>
                    <script language="Javascript" type="text/javascript">
                        alert("Não é possível cadastrar usuario,\nO campo 'Senha' e o campo 'Confirmar Senha' estão diferentes!");
                        window.location='<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/index';
                    </script>
                    <?php
                    break;
                default:
                    $senhaFinal = $senha[1];
                    return $senhaFinal;
                    break;
            }
        }

        public static function SalvarUsuario($nome, $email, $telefone, $senha){
            
            Usuario::validaCamposNulos($nome, $email, $telefone, $senha);
            Usuario::validaNome($nome);
            Usuario::validaEmail($email);
            Usuario::validaTelefone($telefone);
            $senhaFinal = Usuario::validaSenha($senha);
            
            $sql="INSERT INTO senha (codigo_senha) VALUES ('".$senhaFinal."')";
            $comando = Yii::app()->db->createCommand($sql);
            $comando->execute();

            $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$senhaFinal."'";
            $comando2 = Yii::app()->db->createCommand($sql2);
            $id_senha = $comando2->queryRow();

            $sql3="INSERT INTO usuario (nome, email, telefone, senha_id) VALUES ('".$nome."', '".$email."', '".$telefone."','".$id_senha['id_senha']."')";
            $comando3 = Yii::app()->db->createCommand($sql3);
            $comando3->execute();
                    
        }//fim function cadastrar
    
    public static function checaCadastro($email, $senha){
        
        $sql="SELECT * FROM usuario WHERE email = '".$email."'";
        $comando = Yii::app()->db->createCommand($sql);
       $resultado = $comando->queryAll();
       
        $sql2="SELECT * FROM senha WHERE codigo_senha = '".$senha."'";
        $comando2 = Yii::app()->db->createCommand($sql2);
       $resultado2 = $comando2->queryAll();
       
       if($resultado['senha_id'] == $resultado2['id_senha']){
           return $resultado;
       }else {
           ?>
                    <script language="Javascript" type="text/javascript">
                        alert("Usuário não encontrado!");
                        window.location='<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/femail';
                    </script>
                    <?php
       }
       
    }

    public static function Alterar($nomeNovo, $emailNovo, $telefoneNovo, $senhaNova, $id){
            Usuario::validaCamposNulos($nomeNovo, $emailNovo, $telefoneNovo, $senhaNova);
            Usuario::validaNome($nomeNovo);
            Usuario::validaEmail($emailNovo);
            Usuario::validaTelefone($telefoneNovo);
            $senhaFinal = Usuario::validaSenha($senhaNova);
            /*
             * "SELECT id_usuario FROM  usuario WHERE email = '".$email."', senha = '".$senha."'";
             * "DELETE FROM usuario WHERE is_usuario = '".$id_usuario."'"; 
             * "DELETE FROM senha WHERE id_senha = '".$senha."'"; 
             * "UPDATE usuario SET email = '".$emailNovo."' WHERE id_usuario = '".$id_usuario."'";
             * "UPDATE usuario SET nome = '".$nomeNovo."', telefone = '".$telefoneNovo."' WHERE id_usuario = '".$id_usuario."'";
             * "UPDATE senha SET codigo_senha = '".$senhaNova."' WHERE id_senha = '".$id_senha  ."'";
            */
            $sql="UPDATE usuario SET email = '".$emailNovo."', nome = '".$nomeNovo."',telefone = '".$telefoneNovo."'
                WHERE id_pessoa = '".$id."'";
            $comando = Yii::app()->db->createCommand($sql);
            $comando->execute();

            $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$senhaFinal."'";
            $comando2 = Yii::app()->db->createCommand($sql2);
            $id_senha = $comando2->queryRow();

            $sql3="INSERT INTO usuario (nome, email, telefone, senha_id) VALUES ('".$nome."', '".$email."', '".$telefone."','".$id_senha['id_senha']."')";
            $comando3 = Yii::app()->db->createCommand($sql3);
            $comando3->execute();
        }
        
        
        public static function Deletar($email, $senha){
            $sql="DELETE FROM usuario WHERE email = '".$email."'";
            $comando = Yii::app()->db->createCommand($sql);
            $comando->execute();
            
            $sql1="DELETE FROM senha WHERE codigo_senha = '".$senha."'";
            $comando1 = Yii::app()->db->createCommand($sql1);
            $comando1->execute();
            
        }
        
        public static function getCadastrados(){
            $sql="SELECT nome FROM usuario ";
            $comando = Yii::app()->db->createCommand($sql);
            $resultado = $comando->queryAll();
            return $resultado;
        }
        
        public static function getCadastradosPorId($idPessoa){
            $sql="SELECT * FROM usuario WHERE id_pessoa = '".$idPessoa."'";
            $comando = Yii::app()->db->createCommand($sql);
            $resultado = $comando->queryAll();
            return $resultado;
        }
        
        public static function getSenhaPorId($idSenha){
            $sql="SELECT codigo_senha FROM senha WHERE id_senha = '".$idSenha."'";
            $comando = Yii::app()->db->createCommand($sql);
            $resultado = $comando->queryAll();
            return $resultado;
        }
        
	public static function model($className=__CLASS__){
		return parent::model($className);
	}

	public function tableName(){
		return 'usuario';
	}

	public function rules(){
		
		return array(
			array('senha_id', 'numerical', 'integerOnly'=>true),
			array('nome, email', 'safe'),
			
			array('id_pessoa, senha_id, nome, email', 'safe', 'on'=>'search'),
		);
	}

	public function relations(){
		
		return array(
			'senha' => array(self::BELONGS_TO, 'Senha', 'senha_id'),
		);
	}

	public function attributeLabels(){
		return array(
			'id_pessoa' => 'Id Pessoa',
			'senha_id' => 'Senha',
			'nome' => 'Nome',
			'email' => 'Email',
		);
	}

	public function search(){
		
		$criteria=new CDbCriteria;

		$criteria->compare('id_pessoa',$this->id_pessoa,true);
		$criteria->compare('senha_id',$this->senha_id);
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
        ?>