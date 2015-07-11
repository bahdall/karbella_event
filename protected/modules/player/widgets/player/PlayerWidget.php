<?php
Yii::import('application.modules.player.models.*');

class PlayerWidget extends CWidget
{
	public $cssFile;
	
    public $config = array();
	
    public $id;
    
    public $playlist_id;
    
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
        $this->htmlOptions['class'] ="player";
		$player = PlayerPlaylist::model()->findByPK($this->playlist_id);
		
        $this->render('index',array(
         'player'=>$player,
        ));
    }
	
	public function publishAssets()
	{
		$assets = dirname(__FILE__).'/assets';
		$baseUrl = Yii::app()->assetManager->publish($assets);
		if(is_dir($assets)){
//			Yii::app()->clientScript->registerScriptFile($baseUrl . '/jplayer/jquery.jplayer.min.js', CClientScript::POS_HEAD);
			Yii::app()->clientScript->registerScriptFile($baseUrl . '/audiojs/audio.min.js', CClientScript::POS_HEAD);
//			Yii::app()->clientScript->registerScriptFile($baseUrl . '/add-on/jplayer.playlist.min.js', CClientScript::POS_HEAD);
//			Yii::app()->clientScript->registerCssFile($baseUrl . '/skin/blue.monday/css/jplayer.blue.monday.css');
		} else {
			throw new Exception('Error: Couldn\'t publish assets.');
		}
	}
}
