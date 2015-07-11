<?php


/**
 * Store options for dropdown and multiple select
 * This is the model class for table "PollChoices".
 *
 * The followings are the available columns in table 'PollChoices':
 * @property integer $poll_id
 * @property string $name
 * @property integer $sort
 */
class PollChoice extends BaseModel
{

	public $translateModelName = 'PollChoiceTranslate';

	/**
	 * @var string multilingual attr
	 */
	public $name;

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CActiveRecord the static model class
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
		return 'PollChoice';
	}

   /**
    * @return array validation rules for model attributes.
    */
	public function rules()
	{
		return array(
			array('sort','safe'),
       );
	}

	public function relations()
	{
		return array(
			         'choice_translate' => array(self::HAS_ONE, $this->translateModelName, 'object_id'),
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
				'relationName'=>'choice_translate',
				'translateAttributes'=>array(
					'name',
				),
			)
		);
	}
    
    
    public function getVote($id)
	{
	    $vote = PollChoice::model()->findByPk($id); 
        
        $cd=Yii::app()->db->createCommand();
        $cd->select('SUM(pch.votes) as sum');
        $cd->from('PollChoice pch');
        $cd->where('poll_id=:id', array(':id'=>$vote->poll_id));
        $count = $cd->queryScalar();
        
        $vote = ($vote->votes/$count)*100; 
     
        $vote = round($vote);
     
      return $vote;
    }

}