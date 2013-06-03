<?php


class Usuario extends CActiveRecord
{
    	private $id_pessoa;
    	private $senha_id;
    	private $nome;
    	private $email;
    	private $telefone;
    	
    	public function __construct($nome, $email, $telefone)
    	{
    		$this->nome = $nome;
    		$this->email = $email;
    		$this->telefone = $telefone;
    	}
    
        public function validaNome($nome){
            
            $caracateresValidos = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','á','ã','à','õ','ó','ò','í','ú','é');
            $nome = strtolower($nome);
            $vetorDeChar = str_split($nome);
            
            for ($i = 0; $i < count($vetorDeChar); $i++) {
                if ($caracateresValidos.indexOf($vetorDeChar($i)) == -1) {
                    ?><script language="Javascript" type="text/javascript">
                        alert("Não é possível cadastrar usuario,\nO campo 'Nome' possui caracteres invalidos!");
                        window.location='<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/index';
                    </script><?php
                }
            }
        }

       
        public static function Cadastrar($nome, $email, $telefone, $senha){
            
            if(empty($nome) || empty($email) || empty($telefone) || empty($senha[0]) || empty($senha[1])){
                    ?>
                    <script language="Javascript" type="text/javascript">
                        alert("Não é possível cadastrar usuario,\nexistem campos em branco.\n\n\
                        Todos os campos devem ser preenchidos!");
                        window.location='<?php echo Yii::app()->request->baseUrl; ?>/index.php/usuario/index';
                    </script><?php
                    }//fim if empty
			
                    Usuario::validaNome($nome);
            
            if($senha[0]===$senha[1]){
                
                $senhaFinal = $senha[1];
            
                $sql="INSERT INTO senha (codigo_senha) VALUES ('".$senhaFinal."')";
                $comando = Yii::app()->db->createCommand($sql);
                $comando->execute();

                $sql2="SELECT id_senha FROM senha WHERE codigo_senha='".$senhaFinal."'";
                $comando2 = Yii::app()->db->createCommand($sql2);
                $id_senha = $comando2->queryRow();

                $sql3="INSERT INTO usuario (nome, email, telefone, senha_id) VALUES ('".$nome."', '".$email."', '".$telefone."','".$id_senha['id_senha']."')";
                $comando3 = Yii::app()->db->createCommand($sql3);
                $comando3->execute();
             }else{?>
               <script language="Javascript">
                    alert("A senha e a confirmação da senha estão diferentes!");
               </script><?php
             }?>
               <script language = "Javascript">
                    location.reload();
                </script><?php
        }//fim function cadastrar
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'usuario';
	}

	public function rules()
	{
		
		return array(
			array('senha_id', 'numerical', 'integerOnly'=>true),
			array('nome, email', 'safe'),
			
			array('id_pessoa, senha_id, nome, email', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		
		return array(
			'senha' => array(self::BELONGS_TO, 'Senha', 'senha_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id_pessoa' => 'Id Pessoa',
			'senha_id' => 'Senha',
			'nome' => 'Nome',
			'email' => 'Email',
		);
	}

	public function search()
	{
		
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