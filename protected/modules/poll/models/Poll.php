<?php

Yii::import('application.modules.poll.models.PollTranslate');



class Poll extends BaseModel
{
    
    public $name;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @return Banner the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Poll';
	}
    
    /**
	 * Name of the translations model.
	 */
	public $translateModelName = 'PollTranslate';


	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('name, status', 'required'),
			array('description','safe'),
            array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			array('id, name, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		    'translate'=>array(self::HAS_ONE, $this->translateModelName, 'object_id'),
            'choice'=> array(self::HAS_MANY, 'PollChoice', 'poll_id'),
		);
	}
    
    	/**
	 * @return array
	 */
	public function behaviors()
	{
		return array(
			'STranslateBehavior'=>array(
				'class'=>'ext.behaviors.STranslateBehavior',
				'translateAttributes'=>array(
					'name'
				),
			),
		);
	}

	public function scopes()
	{
		return array(
			'active' => array(
				'condition' => 'status !=0'
			),
		); 
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => Yii::t('Poll.core', 'Название'),
			'status' => Yii::t('Poll.core', 'Статус'),
		);
	}

	/**
	 * @return array
	 */
	public static function statuses()
	{
		return array(
			'0'=>Yii::t('Poll.core', 'Не активен'),
			'1'=>Yii::t('Poll.core', 'Активен'),
		);
	}

	/**
	 * @return mixed
	 */
	public function getStatusLabel()
	{
		$statuses = $this->statuses();
		return $statuses[$this->status];
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions. Used in admin search.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
        
  	    $criteria->with = array('translate');
		
        $criteria->compare('t.id',$this->id);
		
		$criteria->compare('t.status',$this->status);
        
        $criteria->compare('translate.name',$this->name,true);

	
        // Create sorting by translation title
		$sort=new CSort;
		$sort->attributes=array(
			'*',
			'name' => array(
				'asc'   => 'translate.name',
				'desc'  => 'translate.name DESC',
			)
		);
        

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination'=>array(
				'pageSize'=>20,
			)
		));
	}

	/**
	 * @return bool
	 */
	public function beforeSave()
	{

		return parent::beforeSave();
	}


	public static function getChoice($id)
	{
		return $models = PollChoice::model()->findAll("poll_id=:poll_id",array(":poll_id"=>$id));
	}
    
    public function get_client_ip() 
    {
        return $_SERVER[HTTP_X_FORWARDED_FOR];
    }
    public function isVote($id)
	{
	   if(Yii::app()->user->isGuest){
              if(PollVote::model()->find("ip_address=:ip_address and poll_id=:poll_id",array(":ip_address"=>$this->get_client_ip(),":poll_id"=>$id))){
                return true; 
              }else{
                return false;}
       }else{
              if(PollVote::model()->find("user_id=:user_id and poll_id=:poll_id",array(":user_id"=>Yii::app()->user->id,":poll_id"=>$id))){
                return true; 
              }else{
                return false;}
       }
    }
}
