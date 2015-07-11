<?php
Yii::import('application.modules.poll.models.*');

class PollWidget extends CWidget
{
	public $cssFile;
	
    public $config = array();
	
    public $id;
    
    public $poll_id;
    
    public $width;
	
    public $height;

    public $htmlOptions=array();
    
	public function init()
	{
		if (isset($this->id)) {
		
        $this->htmlOptions['id']=$this->id;
	    
        } else {
			$this->htmlOptions['id']=$this->getId();
		}
        $this->publishAssets();
	}
	
    public function run()
    {
        $this->htmlOptions['style'] = 'width: '.$this->width.'px; height: '.$this->height.'px;';
        $this->htmlOptions['class'] ="poll";
		$poll = Poll::model()->findByPK($this->poll_id);
		
        $this->render('index',array(
         'poll'=>$poll,
        ));
    }
	
	public function publishAssets()
	{
		$assets = dirname(__FILE__).'/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		if(is_dir($assets)){
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/js/poll.js', CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerCssFile($baseUrl . '/css/poll.css');
		} else {
			throw new Exception('Error: Couldn\'t publish assets.');
		}
	}
}
