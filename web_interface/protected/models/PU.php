<?php

/**
 * This is the model class for table "T_PU".
 *
 * The followings are the available columns in table 'T_PU':
 * @property integer $id
 * @property integer $userId
 * @property integer $projectId
 * @property integer $type
 * @property integer $rank
 * @property integer $top
 */
class PU extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PU the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public static function getAllUserId($projectId)
	{
		//获取此projectId下的PU的所有userId
		$array = array();
		$PUs = PU::model()->findAll("projectId=:p",array(":p"=>$projectId));
		foreach($PUs as $One)
		{
			$array[] = $One['userId'];
		}
		return $array;
	}
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'T_PU';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userId, projectId, type', 'required'),
			array('userId, projectId, type, rank, top', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, userId, projectId, type, rank, top', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'userId' => 'User',
			'projectId' => 'Project',
			'type' => 'Type',
			'rank' => 'Rank',
			'top' => 'Top',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('userId',$this->userId);
		$criteria->compare('projectId',$this->projectId);
		$criteria->compare('type',$this->type);
		$criteria->compare('rank',$this->rank);
		$criteria->compare('top',$this->top);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}