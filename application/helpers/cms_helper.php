<?php
if (!function_exists("cms_header")){
	function cms_header(){
		$header = array();
		$modules = get_modules();
		foreach ($modules as $m){
			if (file_exists(MODPATH.$m."/config/config.php")){
				include(MODPATH.$m."/config/config.php");
				if (isset($config)){
					if (isset($config['cms']) && is_array($config['cms'])){
						$header[] = $config['cms'];
					}
					unset($config);
				}
			}
		}
		return $header;
	}
}