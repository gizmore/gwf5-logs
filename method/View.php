<?php
final class Logs_View extends GWF_MethodForm
{
	/**
	 * @var GWF_User
	 */
	private $user;
	
	private $dateMin, $dateMax;
	
	public function execute()
	{
		$this->dateMin = GWF_Time::getDate();
		$this->dateMax = GWF_Time::getDate();
		return parent::execute()->add($this->renderLogfiles());
	}
	
	public function createForm(GWF_Form $form)
	{
		$form->addField(GDO_Date::make('log_date_from'));
		$form->addField(GDO_Date::make('log_date_to'));
		$form->addField(GDO_User::make('log_user'));
		$form->addField(GDO_Submit::make()->label('view'));
	}
	
	public function formValidated(GWF_Form $form)
	{
		$this->dateMin = $form->getField('log_date_from')->getGDOValue();
		$this->dateMax = $form->getField('log_date_to')->getGDOValue();
		$this->user = $form->getField('log_user')->getGDOValue();
	}
	
	public function renderLogfiles()
	{
		$path = GWF_PATH . 'protected/logs/';
		$path .= $this->user ? $this->user->getUserName() : '';
		$response = new GWF_Response('');
		GWF_Filewalker::traverse($path, [$this, 'renderLogfile'], false, true, $response);
		return $response;
	}
	
	public function renderLogfile($entry, $path, $response)
	{
		$response->add($this->templatePHP('logfile.php', ['path' => $path]));
	}
}
