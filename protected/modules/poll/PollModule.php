<?php

class PollModule extends BaseModule
{
	public $moduleName = 'poll';

	public function init()
	{
		$this->setImport(array(
			'application.modules.poll.models.*',
			'application.modules.core.models.*',
			'application.modules.core.CoreModule',
		));
	}
}