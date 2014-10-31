<?php
$route['(:any)/cms/static/(:any)'] = "static/cms/$2";
$route['cms/static/(:any)'] = "static/cms/$1";
$route['cms/static'] = "static/cms/index";
//$route['cms'] = "static/cms/index";

$route['(:any)/(:any)'] = "static/view/view/$2/$1";
$route['(:any)'] = "static/view/view/$1";

$route['default_controller'] = "static/view";
