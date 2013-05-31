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
    
        public static function Cadastrar($nome, $email, $telefone, $senha){

            $nomeBranco;
            $emailBranco;
            $telefoneBranco;
            $senhaBranco;
            
            if(empty($nome)){
            //    Alerta quando o campo NOME está em branco
                 $nomeBranco = true; 
            }
            if(empty($email)){
            //    Alerta quando o campo EMAIL está em branco
                  $emailBranco=true;
            }
            if(empty($telefone)){
                //    Alerta quando o campo TELEFONE está em branco
                  $telefoneBranco = true;
            }
            if(empty($senha[0])){
                //    Alerta quando o campo SENHA está em branco
                  $senhaBranco = true;
            }
            if(empty($senha[1])){
                //    Alerta quando o campo CONFIRMAÇÃO SENHA está em branco
                  $senhaBranco = true;
            }
            if(empty($nome) || empty ($email) || empty ($telefone) || empty($senha[0]) || empty($senha[1])){
                    if($nomeBranco && $emailBranco && $telefoneBranco && $senhaBranco[0] && $senhaBranco[1])
                    {
                     echo "<script> alert('Não é possível cadastrar usuario,\n
                         existem campos em branco.\\nTodos os campos devem ser preenchidos!')</script>";
                     ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if($nomeBranco && $emailBranco && $telefoneBranco && $senhaBranco[0] && !$senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos NOME, EMAIL, TELEFONE E SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if($nomeBranco && $emailBranco && $telefoneBranco && !$senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos NOME, EMAIL, TELEFONE E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if($nomeBranco && $emailBranco && !$telefoneBranco && $senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos NOME, EMAIL, SENHA E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if($nomeBranco && !$emailBranco && $telefoneBranco && $senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos NOME, TELEFONE, SENHA E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && $emailBranco && $telefoneBranco && $senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos EMAIL, TELEFONE, SENHA E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && !$emailBranco && $telefoneBranco && $senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos TELEFONE, SENHA E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && $emailBranco && !$telefoneBranco && $senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos EMAIL, SENHA E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && $emailBranco && $telefoneBranco && !$senhaBranco[0] && $senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos EMAIL, TELEFONE E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && $emailBranco && $telefoneBranco && $senhaBranco[0] && !$senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos EMAIL, TELEFONE E SENHA em branco!')</script>";
                            ?>
                    <script language = "Javascript">
                        location.reload();
                    </script><?php
                    }else if(!$nomeBranco && $emailBranco && $telefoneBranco && $senhaBranco[0] && !$senhaBranco[1]){
                        echo"<script> alert('Não é possível cadastrar usuários,\n
                            campos EMAIL, TELEFONE E CONFIRMAÇÃO DE SENHA em branco!')</script>";
                            ?>
                    }
            }
            
            <?php

            
            
            
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
            }else{
            ?>
                <script language="Javascript">
                    alert("A confirmação da senha está diferente!");
                </script>
           <?php }?>
             <script language = "Javascript">
        window.location="<?php echo Yii::app()->request->baseUrl; ?>";
        </script>
            
        <?php }
    
    
        }
        
    
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
