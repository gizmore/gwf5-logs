<?php
final class Logs_Rotate extends GWF_MethodCronjob
{
	public function run()
	{
		$module = Module_Logs::instance();
		
		if ($module->cfgLogRotation())
		{
			$now = date('Ymd');
			$last = $module->cfgLastRotation();
			$now = GWF_Time::getDate(mktime(0,0,0));
			if ($last != $now)
			{
				$this->logRotate();
// 				$module->saveConfigValue('log_last_rotation', $now);
			}
		}
	}
	
	public function logRotate()
	{
		$this->logNotice('Log Rotation');
		
	}
}
