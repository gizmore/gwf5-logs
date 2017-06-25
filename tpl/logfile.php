<?php
echo GDO_Box::make()->title(basename($path))->content(file_get_contents($path))->render();
