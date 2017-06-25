<?php
final class Module_Logs extends GWF_Module
{
	public function getConfig()
	{
		return array(
			GDO_Checkbox::make('log_requests')->initial('0'),
			GDO_Checkbox::make('log_rotation_mail')->initial('1'),
			GDO_Checkbox::make('log_rotation')->initial('1'),
			GDO_Date::make('last_log_rotation'),
		);
	}
	
	public function cfgLogRequests() { return $this->getConfigValue('log_requests'); }
	public function cfgLogRotationMail() { return $this->getConfigValue('log_rotation_mail'); }
	public function cfgLogRotation() { return $this->getConfigValue('log_rotation'); }
	public function cfgLastRotation() { return $this->getConfigValue('last_log_rotation'); }
}
