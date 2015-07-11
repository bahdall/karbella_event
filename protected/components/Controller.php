<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends RController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/main';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu = array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs = array();

	/**
	 * @var string
	 */
	public $pageKeywords;

	/**
	 * @var string
	 */
	public $pageDescription;

	/**
	 * @var string
	 */
	private $_pageTitle;

	/**
	 * Set layout and view
	 * @param mixed $model
	 * @param string $view Default view name
	 * @return string
	 */
	protected function setDesign($model, $view)
	{
		// Set layout
		if ($model->layout)
			$this->layout = $model->layout;

		// Use custom page view
		if ($model->view)
			$view = $model->view;

		return $view;
	}

	/**
	 * @param $message
	 */
	public  function addFlashMessage($message)
	{
		$currentMessages = Yii::app()->user->getFlash('messages');

		if (!is_array($currentMessages))
			$currentMessages = array();

		Yii::app()->user->setFlash('messages', CMap::mergeArray($currentMessages, array($message)));
	}

	public function setPageTitle($title)
	{
		$this->_pageTitle=$title;
	}


	public function getPageTitle()
	{
		$title=Yii::app()->settings->get('core', 'siteName');
		if(!empty($this->_pageTitle))
			$title=$this->_pageTitle.=' / '.$title;
		return $title;
	}


	public function runLayout($position)
	{
		$route = $this->module->id."/".$this->id."/".$this->action->id;

		$layout = SystemLayouts::model()->orderById()->find(':route LIKE route',array(
			':route' => $route,
		));

		$layoutWidgets = SystemLayoutsWidgets::model()->sort()->findAll('layout_id = :layout_id AND position = :position',array(
			':layout_id' => $layout->id,
			':position'  => $position,
		));

		foreach($layoutWidgets as $layoutWidget)
		{
			$widget = $layoutWidget->widget;
			if($widget)
				$this->widget($widget->class,$widget->getParams());
		}

	}




	public function isHome()
	{
		if($this->module->id == 'store' && $this->id == 'index' && $this->action->id == 'index')
		{
			return true;
		}
		return false;
	}



	public function beforeAction($action)
	{
		$this->setLayout('main');
		return parent::beforeAction($action);
	}


	public function setLayout($layout)
	{

		$layoutFile = (Yii::app()->settings->get('core','theme'))?Yii::app()->basePath."/views/layouts/".Yii::app()->settings->get('core','theme').".php" : $this->layout;


		if(Yii::app()->settings->get('core','theme') && file_exists($layoutFile) )
			$this->layout = '//layouts/'.Yii::app()->settings->get('core','theme');
		else
			$this->layout = '//layouts/'.$layout;
	}



}