<?php
$navbar = GDO_Bar::make('tabs');
$navbar->addFields(array(
	GDO_Link::make('link_log_view')->href(href('Logs', 'View')),
));
echo $navbar->render();
