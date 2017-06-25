<?php
final class Logs_Overview extends GWF_Method
{
	public function execute()
	{
		return $this->templatePHP('overview.php');
	}
}
