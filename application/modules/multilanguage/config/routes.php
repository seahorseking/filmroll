<?php
$route['(:any)/cms/multilanguage/(:any)'] = "multilanguage/cms/$2";
$route['cms/multilanguage/(:any)'] = "multilanguage/cms/$1";
$route['cms/multilanguage'] = "multilanguage/cms/index";