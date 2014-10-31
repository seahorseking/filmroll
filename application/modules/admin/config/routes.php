<?php
$route['(:any)/cms/admin/(:any)'] = "admin/$2";
$route['cms/admin/(:any)'] = "admin/$1";
$route['cms/admin'] = "admin/login";
$route['cms'] = "admin/login/index";