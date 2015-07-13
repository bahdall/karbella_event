<?php
Yii::import('application.modules.events.models.*');

class LastEvents extends CWidget
{
	public $section_id;
	public $provider;
	public $htmlOptions=array();
	public $count=3;
	public $countImages=6;
	public $pagination=false;
	public $view = 'index';

	
    public function run()
    {
		$criteria=new CDbCriteria();
		$count=Event::model()->count($criteria);
		$pages=new CPagination($count);

		// results per page
		$pages->pageSize=$this->count;
		$pages->applyLimit($criteria);
		$events=Event::model()->findAll($criteria);


		$this->provider = new CActiveDataProvider('Event', array(
			// Set id to false to not display model name in
			// sort and page params
			'id'=>false,
			'pagination'=>array(
				'pageSize'=>$this->count,
			)
		));


		$this->render($this->view,array(
			'events' => $events,
			'pages' => $pages,
			'provider' => $this->provider,
		));
	}
	

}
