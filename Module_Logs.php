<?php
final class Module_Logs extends GWF_Module
{
	public function getConfig()
	{
		return array(
			GDO_Checkbox::make('log_requests')->initial('0'),	
		);
	}
}
