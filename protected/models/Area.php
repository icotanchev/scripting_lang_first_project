<?php
class Area extends CActiveRecord
{
	public function tableName()
	{
		return 'tbl_area';
	}

	public function rules()
	{
		return array(
			array('area_name', 'required'),
			array('area_name', 'length', 'max'=>25),
			array('geo', 'safe'),
			array('id, area_name, geo, client_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array('clients'=>array(self::BELONGS_TO, 'Client', 'id'));
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'area_name' => 'Area Name',
			'geo' => 'Geo',
			'client_id' => 'Client ID',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('area_name',$this->area_name,true);
		$criteria->compare('client_id',$this->client_id,true);
		$criteria->compare('geo',$this->geo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getClients()
	{
    $names = array('select blank');
    foreach (Client::model()->findAll() as $k){
        array_push($names, $k->name);
    }
    return $names;
	}
        
  public function getAreaPoints($area_id){
    $sql= "select astext(geo) from tbl_area where id = ".$area_id.";";
    
    $connection=Yii::app()->db;

    $command=$connection->createCommand($sql);
    $result = $command->queryAll();
    return str_replace("POLYGON(", "", $result[0]['astext(geo)']);
  }
  
  public function areaContainsPoint($client_id, $area_id) {
    $polygon = "select geo from tbl_area where tbl_area.id = ".$area_id.";";
    $sql = "select ST_CONTAINS((select tbl_area.geo from tbl_area where tbl_area.id = ".$area_id."), (select tbl_client.position from tbl_client where tbl_client.id = ". $client_id. "));";
    $connection=Yii::app()->db;
    $command=$connection->createCommand($sql);
    $result = $command->queryAll();
    return $result;
    }
}