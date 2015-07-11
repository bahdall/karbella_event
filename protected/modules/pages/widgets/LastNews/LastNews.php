<?php
Yii::import('application.modules.pages.models.*');

class LastNews extends CWidget
{
	public $section_id;
	public $htmlOptions=array();
	public $count=3;
    public $view = 'index';

	
    public function run()
    {
		$news = Page::model()->published()->filterByCategory($this->section_id)->findAll(array('limit'=> ($this->count > 0) ? $this->count : false));

		$this->render($this->view,array(
			'news' => $news,
			'section_id' => $this->section_id,
		));
	}
	

}
