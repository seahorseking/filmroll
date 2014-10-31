<?php
$route['(:any)/(:any)'] = "rezervacia/view/view/$2/$1";
$route['(:any)'] = "rezervacia/view/view/$1";

$route['default_controller'] = "rezervacia/view";
