<?php
$route['(:any)/film/(:any)'] = "film/view/view/$2/$1";
$route['film/(:any)'] = "film/view/view/$1";

$route['default_controller'] = "film/view";
