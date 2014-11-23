<?php

/**
 * This is the model class for table "tbl_area".
 *
 * The followings are the available columns in table 'tbl_area':
 * @property integer $id
 * @property string $area_name
 * @property string $geo
 */
class Area extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_area';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('area_name', 'required'),
			array('area_name', 'length', 'max'=>25),
			array('geo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, area_name, geo, client_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'clients'=>array(self::BELONGS_TO, 'Client', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'area_name' => 'Area Name',
			'geo' => 'Geo',
			'client_id' => 'Client ID',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('area_name',$this->area_name,true);
		$criteria->compare('client_id',$this->client_id,true);
		$criteria->compare('geo',$this->geo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Area the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getClients()
	{
            $names = array();
            foreach (Client::model()->findAll() as $k){
                array_push($names, $k->name);
            }
            return $names;
	}
        
        public function getAreaPoints($area_id){
            $sql= "select astext(geo) from tbl_area where id = ".$area_id.";";
            
            $connection=Yii::app()->db;

            $command=$connection->createCommand($sql);
            $result = $command->queryAll();//execute();
            return str_replace("POLYGON(", "", $result[0]['astext(geo)']);
        }
        
        public function areaContainsPoint($client_id) {
            $sql = "select id from tbl_area where CONTAINS(tbl_area.geo, (select asText(tbl_client.position) from tbl_client where tbl_client.id = ". $client_id. "));";
            $connection=Yii::app()->db;
            $command=$connection->createCommand($sql);
            $result = $command->queryAll();//execute();
            return $result;
        }
}