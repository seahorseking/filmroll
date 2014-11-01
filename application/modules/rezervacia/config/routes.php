<?php
$route['(:any)/rezervacia/dokoncenie'] = "rezervacia/payment/index/$1";
$route['rezervacia/dokoncenie'] = "rezervacia/payment/index";
$route['(:any)/rezervacia/(:any)'] = "rezervacia/view/view/$2/$1";
$route['rezervacia/(:any)'] = "rezervacia/view/view/$1";

$route['default_controller'] = "rezervacia/view";
