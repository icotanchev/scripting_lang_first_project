<?php

class Client extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_client';
	}

	public function rules()
	{
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>25),
			array('info, position', 'safe'),
			array('id, name, info, position', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
			'areas' => array(self::HAS_MANY, 'Area', 'client_id'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'info' => 'Info',
			'position' => 'Position',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('info',$this->info,true);
		$criteria->compare('position',$this->position,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
  public function getClientName($client_id){
    $sql= "select name from tbl_client where id = ".$client_id.";";
    
    $connection=Yii::app()->db;

    $command=$connection->createCommand($sql);
    $result = $command->queryAll();//execute();
    return $result;
  }
  
  public function getClientPosition($client_id){
    $sql= "select astext(position) from tbl_client where id = ".$client_id.";";
    
    $connection=Yii::app()->db;

    $command=$connection->createCommand($sql);
    $result = $command->queryAll();//execute();
    return str_replace("POLYGON(", "", $result[0]['astext(position)']);
  }
}
