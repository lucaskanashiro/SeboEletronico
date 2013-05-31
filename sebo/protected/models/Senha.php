<?php


class Senha extends CActiveRecord
{
	//atributos
	private $id_senha;
	private $codigo_senha;
	
	//método construtor
	public function __construct($codigo_senha)
	{
		$this->codigo_senha = $codigo_senha;
	}
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
	public function tableName()
	{
		return 'senha';
	}

	
	public function rules()
	{
		
		return array(
			array('codigo_senha', 'numerical', 'integerOnly'=>true),
			
			array('id_senha, codigo_senha', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		
		return array(
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'senha_id'),
		);
	}


	public function attributeLabels()
	{
		return array(
			'id_senha' => 'Id Senha',
			'codigo_senha' => 'Codigo Senha',
		);
	}


	public function search()
	{
	
		$criteria=new CDbCriteria;

		$criteria->compare('id_senha',$this->id_senha,true);
		$criteria->compare('codigo_senha',$this->codigo_senha);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
