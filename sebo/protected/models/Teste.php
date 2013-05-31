<?php

class Teste extends CActiveRecord
{
	private $id;
	private $descricao;
	private $ok;

	public function __construct($descricao, $ok)
	{
		$this->descricao = $descricao;
		$this->ok = $ok;
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	
	public function tableName()
	{
		return 'teste';
	}


	public function rules()
	{
		
		return array(
			array('descricao, ok', 'safe'),
			
			array('id, descricao, ok', 'safe', 'on'=>'search'),
		);
	}


	public function relations()
	{
		
		return array(
		);
	}


	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'descricao' => 'Descricao',
			'ok' => 'Ok',
		);
	}

	
	public function search()
	{
	
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('ok',$this->ok);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
