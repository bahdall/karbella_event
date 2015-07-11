<?php

class PollVote extends BaseModel
{

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'PollVote';
	}
   

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('poll_id, choice_id, user_id, ip_address, time','safe'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
		);
	}
 
	/**
	 * @return bool
	 */
	public function beforeSave()
	{

		return parent::beforeSave();
	}

}
